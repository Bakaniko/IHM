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

# resa = open('reservations.csv', 'wa')

# Main algorithme

nbUtilisateur = 900
nbPlace = 20
i = 1
pointer = 1

while i < (nbPlace + 1):
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

            # to avoid nbPlace overflow
            if (pointer + nbReservation > nbPlace):
                nbReservation = nbPlace - pointer
            for j in range(0, nbReservation):
                print str(i + j) + u" isReserved"  # output

            pointer = i + nbReservation  # pointer moves forward

        # if tails
        else:
            # print u"siege " + str(i) + " libre"

            pointer += 1  # nothing happens, the pointer move forward

    i += 1  # i moves forward

# resa.close()
