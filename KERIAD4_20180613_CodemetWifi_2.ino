#include <SoftwareSerial.h>
#include <SparkFunESP8266WiFi.h>

#define NETWORK_NAME "HKU"
#define NETWORK_PASSWORD "draadloos"

int vochtSensor = A0;
int ledPin = 7;
int button1Pin = 4;
int button2Pin = 5;
int button1State = 0;
int button2State = 0;

bool HasLEDTurnedOn = false;

void setup() {
  Serial.begin(9600);
  setupESP8266();

  pinMode(ledPin, OUTPUT);
  //  pinMode(button1Pin, INPUT);
  //  pinMode(button2Pin, INPUT);

  pinMode(button1Pin, INPUT_PULLUP);
  pinMode(button2Pin, INPUT_PULLUP);

} //void setup

void loop() {

  int sensorValue = analogRead(vochtSensor);
  button1State = digitalRead(button1Pin);
  button2State = digitalRead(button2Pin);


  //---------------


  Serial.println(sensorValue);

  delay(1000);


  //If (led HIGH) dan (INSERT user.Naam, temperature.Locatie, temperature.tijd_nat) in database
  //HasLEDTurnedOn kijkt of de led aan is geweest. zo niet, ga dan nu aan, zo wel ga naar de volgende if-statement
  if (sensorValue < 600 && !HasLEDTurnedOn) {
    digitalWrite(ledPin, HIGH);
    Serial.println("Katheter is vol");

    HasLEDTurnedOn = true;

    delay(1000);

    //waarschuwing uit Waarschuwing.php halen
    String response;
    int result;

    result = sendRequest("studenthome.hku.nl", "/~noura.dakkak/1.KERIAD4/5.herkansing2018/Waarschuwing.php?waarschuwing", response);
    int waarschuwing = getBody(response).toInt();
    Serial.print("Legen binnen ");
    Serial.println(waarschuwing);
    Serial.print(" uur!");
    delay(100);


    //nu tegen php file zeggen dat hij moet inserten
    String request = "/~noura.dakkak/1.KERIAD4/5.herkansing2018/insert_nat.php?thing_id=1";

    //    String response;
    int result2 = sendRequest("studenthome.hku.nl", request, response);
    if (result2 < 0) {
      Serial.println(F("Failed to connect to server insert_nat."));
    } else {
      Serial.println(response);
    } //if: else

  } //if: sensor



  //---------------



  if (button1State == HIGH) {
    Serial.println("Op tijd geleegd");
    digitalWrite(ledPin, LOW);

    //If (knop1 HIGH) dan (INSERT temperature.tijd_geleegd, data_knop) in database
    String request = "/~noura.dakkak/1.KERIAD4/5.herkansing2018/insert_geleegd.php?thing_id=1&";
    request += "Op tijd geleegd";

    String response;
    int result = sendRequest("studenthome.hku.nl", request, response);
    if (result < 0) {
      Serial.println(F("Failed to connect to insert_geleegd."));
    } else {
      Serial.println(response);
    }

  } //if: button1State

  if (button2State == HIGH) {
    Serial.println("Niet op tijd geleegd");
    digitalWrite(ledPin, LOW);

    int button2State = 0; 


    //If (knop2 HIGH) dan (INSERT temperature.tijd_geleegd, data_knop) in database
    String request = "/~noura.dakkak/1.KERIAD4/5.herkansing2018/insert_geleegd.php?thing_id=1&";
    request += "Niet op tijd geleegd";

    String response;
    int result = sendRequest("studenthome.hku.nl", request, response);
    if (result < 0) {
      Serial.println(F("Failed to connect to insert_geleegd."));
    } else {
      Serial.println(response);
    }


  } //if: button2State


} //void loop


//String getBody(const String& response) {
//  int bodyStart = response.indexOf("\r\n\r\n");
//  int bodyEnd = response.indexOf('\n', bodyStart + 4);
//  String result = response.substring(bodyStart + 4, bodyEnd);
//  result.trim();

String getBody(const String& response) {
  int bodyStart = response.indexOf("binnen:");
  int bodyEnd = response.indexOf("uur", bodyStart + 3);
  String result = response.substring(bodyStart + 3, bodyEnd);
  result.trim();

  return result;

}


