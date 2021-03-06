#include <DHT.h>
#include <ESP8266WiFi.h>

const char* ssid = "************";
const char* password = "**********";
 
const char* server= "www.cs14.net";
#define DHTPIN 12 // which means pin no.6 from nodemcu
 
DHT dht(DHTPIN, DHT22,15);
WiFiClient client;
   
 
void setup() {                
  Serial.begin(115200);
  delay(10);
  dht.begin();
  
  WiFi.begin(ssid, password);
 
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
   
  WiFi.begin(ssid, password);
   
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
  
}
 
 
void loop() {
   
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  if (isnan(h) || isnan(t)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }

 String hstring = String(h);
 String tstring = String(t);
  if (client.connect(server,80)) {  //   www.cs14.net

client.println("GET /info.php?chipid=200&temperature=" + tstring + "&humidity=" + hstring);
//client.println();

     Serial.print("Temperature: ");
     Serial.print(t);
     Serial.print(" degrees Celcius Humidity: "); 
     Serial.print(h);
     Serial.println("% send to cs14.net");    
  }
  client.stop();
   
  Serial.println("Waiting...");    
  delay(20000);  
}
