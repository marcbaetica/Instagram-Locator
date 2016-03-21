# Instagram-Locator
This web application takes in a real world address and using REST calls decodes the information into geograhpical coordinates (via the google maps api) and extracts instagram pictures that were tagged around that location.

NOTE:
You in order to start makin request you need to generate your own access token. This can be done using the following procedure:<br/>
1 - go to https://instagram.com/developer/ and log in with your credentials (or make an instagram accont if you dont already have one) <br/>
2 - go to REGISTER YOUR APPLICATION --> REGISTER NEW CLIENT<br/>
3 - fill out the required documentation and click Register<br/>
4 - got to http://instagram.pixelunion.net/ and click on Generate Access Token<br/>
5 - use the generated access token to fill in the blanks in line 16 in the php file (eg: '&access_token=SomethingSomethingSomething')<br/>
6 - save and restart apache ($sudo service apache2 restart)


Note: The Instagram API only allows a maximum of 5,000 requests/hour for each authorization token. For more details on limitations consut the developer api documentation at https://instagram.com/developer/limits/

Updates: 
- included printing of latitude and longitude
- added an adjustable radius (of up to 5km limited by Instagram) from the given location
- made images hyperlinked so that clicking them sends you to the user's instagram page
