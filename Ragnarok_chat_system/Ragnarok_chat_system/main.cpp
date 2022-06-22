#include <QtCore/QCoreApplication>
#include "socket.h"

int main(int argc, char *argv[])
{
    QCoreApplication a(argc, argv);

	socket * WebSocket = new socket(2569);

    return a.exec();
}
