#pragma once

#include <qobject.h>
#include <QWebSocket>
#include <QWebSocketServer>

#include <QRandomGenerator>
#include <QtSql/qsqldatabase.h>
#include <qdatetime.h>
#include <QSqlDatabase>
#include <QtSql/QtSql>
#include <QSqlQuery>
#include <QtSql>

class socket : public QObject
{
	Q_OBJECT

	QWebSocketServer *webSocketServer;
	QWebSocket * webSocket;
	QVector<QWebSocket*> wsclients;
	QSqlDatabase db;

public:

	socket(quint16 port);
	void dbInit();

private slots:

	void onNewConnection();
	void processTextMessage(const QString& message);
	void socketDisconnected();
	void sendMessageToOthers(const QString& message);
	void addMessageToDatabase(const QString& message);
};
