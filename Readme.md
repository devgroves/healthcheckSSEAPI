# System Health Check Using Server Sent Events with PHP
System's memory details(Available memory,out of total how much memory consumed and the remaining Memory) are automatically updated  by the server to the browser client without any request from the clientbrowser named server sent events.

## Setup steps
Download visualstudio editor and Xampp , a needed platform to create this project.   
[https://www.apachefriends.org/download.html](#Setup-steps)

[https://code.visualstudio.com/download](#Setup-steps)

Refer above links to download and install xampp and Visualstudio respectively. 
## Startup steps

  Move the project file into htdocs of Xampp server folder.
## How it works?

### How to sent data from server side?
 1. It is important to set the headers to be stream on server-side.
 2. Header sets the MIME type to text/event-stream, which is required by the server-side event standard and make the web server to turn off caching otherwise the output of script may be cached.
 3. we are using   `Win32_Processor` instance to get the details by querying from `Win32_OperatingSystem`
 4. The extracted data of cpu performance and memory details of a working system which are sent through HTML5 server-sent events must start with the text data:followed by the actual message text and the new line character sequence (\n\n).
 5. And finally, we have used the PHP flush() function to make sure that the data is sent right away, rather than buffered until the PHP code is complete.
  `flush()` 
### How Data Received on client browser?
 1. To open a connection to the server to begin receiving events from it, create a new EventSource object with the URL of a script that generates the events.
 2. Once event source had instantiated  then client browser can begin listening for messages from the server by attaching a handler for the message event .
 3. once the data is received we are showing it in UI using customized `easyPieChart`.
 
## How To Run the created project?
 1. open xampp,Start Apache server.
 2. Open [http://localhost:8080//serversideevents/view.html](http://localhost:8080//serversideevents/view.html) to view it in your browser.
 3. The page will reload when you make changes.
 4. You may also see any lint errors in the console.
## Demo Snap:
![Alt text](./systemhealthcheck.gif)
