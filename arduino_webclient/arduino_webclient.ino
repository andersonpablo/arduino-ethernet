#include <UIPEthernet.h>

uint8_t mac[6] = {0x00,0x01,0x02,0x03,0x04,0x05};
EthernetClient client;

int sensor1 = 8;
int sensor2 = 9;
String data;

int limiteInf = 500, limiteSup = 1500;
unsigned long timeS1 = 0, timeS2 = 0;
unsigned long dif;
long int nPessoas = 0;

long int nAnterior = 0;

void setup() { 

	pinMode(sensor1, INPUT);
	pinMode(sensor2, INPUT);

  	Serial.begin(9600);

	if (Ethernet.begin(mac) == 0)
		Serial.println("Falha na configuração DHCP"); 
	else
        Serial.println("ok");
  
    data = "";
}

void loop(){
  
	if (!digitalRead(sensor1)){
    	timeS1 = millis(); 
    }
    if (!digitalRead(sensor2)){
    	timeS2 = millis(); 
    }

    dif = timeS2 - timeS1;

    if (dif >= limiteInf and dif <= limiteSup){
    	timeS1 = timeS2 = 0;
    	nAnterior = nPessoas;
    	nPessoas++;
    }


	String data = "valor=" + String(nPessoas);        

	if (nPessoas % 5 == 0 && nAnterior != nPessoas)
	{
		if (client.connect("192.168.0.101",80)) 
		{
	    	Serial.println("-> Conectado");
			client.print("GET /sensor/add.php?"+String(data));
	    	client.println(); 
	        client.stop();
		}
		nAnterior = nPessoas;
	}

	if (client.connected()) { 
		client.stop();
	}
	delay(100);
}
