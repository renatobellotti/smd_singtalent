# Voting Tool for the yearly concert of the Stadtmusik Dietikon in 2019
This repo contains a small voting tool. The code is based on the [landing page Bootstrap theme](https://startbootstrap.com/template-overviews/landing-page/).

The actual code can be found in the files ```index.php``` (login by hash from ticket), ```vote.php```, ```admin.php``` and ```helpers.php```.

Everything that needs to be modified for a production environment can be found in ```helpers.php```: The database configuration, admin password (needed to view the chart with the votes), the names of the singers and the URL of the landing page for the voting tool.

# Database layout: Table ```hashes```
| hash | first | second | third |
| ---- | ----- | ------ | ----- |
- ```hash```:
  
  This number will be printed on the tickets. Each hash is unique. Initially, the other fields are empty.
- ```first```, ```second```, ```third```:
  
  First, second and third priority candidate's ID. The IDs are either 0, 1, 2, 3 or 4. Double votes are not possible, i. e. ```first```, ```second``` and ```third``` contain three different IDs.
