#include "socket.h"

socket::socket(quint16 port)
{
	this->webSocketServer = new QWebSocketServer(QStringLiteral("Server WebSocket"), QWebSocketServer::NonSecureMode);

	if (this->webSocketServer->listen(QHostAddress::AnyIPv4, port))
	{
		qDebug() << "Server WebSocket: Nouvelle connexion sur le port " << port << "\n";

		dbInit();

		QObject::connect(webSocketServer, SIGNAL(newConnection()), this, SLOT(onNewConnection()));
	}
	else
	{
		qDebug() << "Server WebSocket: Erreur d'ecoute sur le port " << port << "\n";
	}
}

void socket::onNewConnection()
{
	webSocket = this->webSocketServer->nextPendingConnection();

	QObject::connect(webSocket, SIGNAL(textMessageReceived(const QString&)), this, SLOT(processTextMessage(const QString&)));

	QObject::connect(webSocket, SIGNAL(disconnected()), this, SLOT(socketDisconnected()));

	this->wsclients.push_back(webSocket);
}

// Receive All message of the WebSocket
void socket::processTextMessage(const QString& message) {

	QWebSocket * ws = qobject_cast<QWebSocket*>(sender());
	addMessageToDatabase(message);
	sendMessageToOthers(message);
}

void socket::sendMessageToOthers(const QString& message) {

	QWebSocket *pSender = qobject_cast<QWebSocket *>(sender());
	for (QWebSocket *pClient : qAsConst(wsclients)) {
			pClient->sendTextMessage(message);
	}

}

void socket::addMessageToDatabase(const QString& message) {

	QString Text = message.section(";", 0, 0);
	QString Sender = message.section(";", 1, 1);

	QSqlQuery query(db);
	QString requete = "INSERT INTO `chat_general` (username, message) VALUES(" + Sender + ", " + Text + ")";

	if (query.exec(requete))
	{
		qDebug() << "Requete Executee" << endl;
	}
	else {
		qDebug() << "// ----- ERROR ----- //" << endl;
		qDebug() << query.lastError() << endl;
		
	}
}

void socket::socketDisconnected()
{

	qDebug() << "Server WebSocket: Deconnexion\n";
}

void socket::dbInit()
{
	db = QSqlDatabase::addDatabase("QSQLITE");
	db.setHostName("127.0.0.1");
	db.setUserName("root");
	db.setPassword("root");
	db.setDatabaseName("ragnarok_v5");

	if (db.open()) {
		qDebug() << "BDD : New Connection";
	}
	else {
		qDebug() << db.lastError();
	}

}