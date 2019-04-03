# Voting Tool for the yearly concert of the Stadtmusik Dietikon in 2019
This repo contains a small voting tool. The code is based on the [landing page Bootstrap theme](https://startbootstrap.com/template-overviews/landing-page/).

The actual code can be found in the files ```index.php``` (login by hash from ticket), ```vote.php```, ```admin.php``` (presents a pie chart with the voting results) and ```helpers.php```.

Everything that needs to be modified for a production environment can be found in ```helpers.php```: The database configuration, admin password (needed to view the chart with the votes), the names of the singers and the URL of the landing page for the voting tool.

# Database layout: Table ```hashes```
| hash | first | second | third |
| ---- | ----- | ------ | ----- |
- ```hash```:
  
  This number will be printed on the tickets. Each hash is unique. Initially, this is the only field that is not ```NULL```.
- ```first```, ```second```, ```third```:
  
  First, second and third priority candidate's ID. Initially, all three fields are ```NULL```. The IDs are either 0, 1, 2, 3 or 4. Double votes are not possible, i. e. ```first```, ```second``` and ```third``` contain three different IDs.
  
# Calculation of the score:
- first: 3 points
- second: 2 points
- third: 1 point

# Generating and inserting the hashes
- Generate the hashes by running:
```python3 generate_hashes.py```
- Open the file ```output.sql``` in your favourite text editor, copy its content and paste it into phpMyAdmin.
