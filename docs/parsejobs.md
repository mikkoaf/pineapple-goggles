# Jobs

The system should handle WA textlogs
and Google Location histories.
These are uploaded via the UploadController
and dispatched as jobs that parse these files.

`/api/upload`


## WA textlogs

Text logs contain 

* timestamps
* person names
* messages

Example of common finnish WA message row:

`1.1.1970 klo 16.20 - Person Name: Message`

From this information we can anticipate
which DialoguePersons exist and which would require
location history

* Check if a DialoguePerson exists for the user with the same name
    * Create new if none found
* Create TextMessage row for each message
* Parse a timestamp for each message

#### Currently app supports possibly only specified Finnish format. 

## Google location history

Location history is provided in a nested json format.
