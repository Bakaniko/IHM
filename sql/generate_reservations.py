#!/usr/bin/env python
# -*- coding: <utf-8> -*-

#############################################
# This script generates random reservations #
# from a few parameters. It delivers it in  #
# a csv file                                #
#                                           #
# project url:                              #
# https://github.com/MinMinLight/IHM        #
#                                           #
# website url:                              #
# http://handiman.univ-paris8.fr/~nicolas/  #
#                                           #
# inspiration:                              #
# http://sametmax.com/lencoding-en-python-une-bonne-fois-pour-toute/ #
#############################################

'''
Parametres en entree:
- nombre de spectacles en base
- nombre de clients en base
- nombre de place dans la salle

format de sortie attendu:
- 1 ligne = 1 enregistrement
idUtilisateur;idRepresentation;idPlace


encodage de la sortie :
une_chaine = une_chaine.encode('utf8')

'''

import random
import csv

# resa = open('reservations.csv', 'wa')

'''
    User id loading
'''

# empty array
usersId = []
file = open("proj_utilisateur.csv", "r")
userCsv = csv.reader(file)
for row in userCsv:
    # print(row[1])
    usersId.append(row[0])

file.close()
# output check
print(usersId)

'''
    Amount of place
'''

# empty array
places = []
file = open("proj_Salle.csv", "r")
salleCsv = csv.reader(file)
for row in salleCsv:
    # print(row[1])
    places.append(row[0])

file.close()
# output check
print(places)


# Main algorithme
idRepresentation = 3
nbUtilisateur = len(usersId)
nbPlaces = len(places)
i = 1
pointer = 1

while i < nbPlaces:
    # from place 1 to nbPlace + 1

    # if i is on the pointer
    if i == pointer:
        # then flip a coin
        isReserve = random.randint(0, 1)

        # if heads
        if isReserve == 1:

            # generates a number of reservations between 1 and 4
            nbReservation = random.randint(1, 4)
            # print u"reservation de " + str(nbReservation) + u" places"

            # pick a random user id
            userId = random.choice(usersId)

            # to avoid nbPlace overflow
            if (pointer + nbReservation > nbPlaces):
                nbReservation = nbPlaces - pointer
            for j in range(0, nbReservation):
                print places[i + j] + u" isReserved by " + str(userId)  # output

            pointer = i + nbReservation  # pointer moves forward

        # if tails
        else:
            # print u"siege " + str(i) + " libre"

            pointer += 1  # nothing happens, the pointer move forward

    i += 1  # i moves forward

# resa.close()
