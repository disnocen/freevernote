# Freevernote
Freevernote aims to be a free software replacement of Evernote, completely manageable from the command line. It is a single `bash` script with multiple functions.

It creates new markdown file, one for each new note. 

## Functionalities

- create new notes with `fvn new`
- search notes with `fvn search <regexp>` (based on `grep`)
- Edit or Export notes to PDF (via Pandoc) 
- count notes with `fvn count`
- it is possible to create a simple web page in order to write from another device, e.g. a smartphone. See directory `mobile`

## TODO

- report of notes
- html export of notes
- report from searched notes
- weekly backup of notes (via `crontab`) 

