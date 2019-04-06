'''Generates hashes in a format suitable for the voting tool.'''
import random
import string

# number of unique hashes to be generated
N = 1000
# number of characters per hash
numCharPerHash = 4
outputFileName = 'output'

# code taken from:
# https://stackoverflow.com/questions/2257441/random-string-generation-with-upper-case-letters-and-digits?rq=1
hashes = set([])
while len(hashes) < N:
    digits = random.choices(string.ascii_uppercase + string.digits, k=numCharPerHash)
    candidate = ''.join(digits)
    hashes.add(candidate)

# output to terminal and text file
with open(outputFileName + '.txt', 'w') as file:
    for h in hashes:
        file.write(h + '\n')
        print(h)

# SQL command:
# INSERT INTO [TABLE] ([COLUMN_NAME]) VALUES (VAL1), (VAL2), (VAL3)
strings = ["('{}')".format(h) for h in hashes]
valueString = ',\n'.join(strings)

sql = 'INSERT INTO hashes (hash) VALUES {};'.format(valueString)

# output to file
with open(outputFileName + '.sql', 'w') as file:
    file.write(sql)
