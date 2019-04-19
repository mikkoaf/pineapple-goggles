# Jobs

The system should handle WA textlogs
and Google Location histories.
These are uploaded via the UploadController
and dispatched as jobs that parse these files.

## WA textlogs

Text logs contain 

* timestamps
* person names
* messages

From this information we can anticipate
which DialoguePersons exist and which would require
location history

TODO: parsing the textlog creates the following
* Check if a DialoguePerson exists for the user with the same name
    * Create new if none found
* Create TextMessage row for each message

##
