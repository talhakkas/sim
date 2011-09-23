#!/usr/bin/python
# -*- coding: utf-8 -*-

import urllib, os

def site_oku(adress):
        net_adress = urllib.urlopen(adress)
        return net_adress.read()

def parcala(page):
        ilk = page.find('<select')
        son = page.find('</select')
        select = page[ilk:son]
        satir = select.split('\n')
        yeni = []
        for i in satir:
                if '</option>' in i:
                        i = i[i.find('>')+1:i.find('</option>')]
                        while i[len(i)-1] == ' ':
                                i = i[:len(i)-1]
                        yeni.append(i)
        return yeni

def dosyala(dizin, file_name, liste):
        with open(dizin + '/' + file_name, 'w') as f:
                for i in liste:
                        f.write(i+'\n')

def php(main_list):
        with open("drug.php", 'w') as f:
                f.write("<?php\n\n")
                no = 0
                for i in main_list:
                        f.write("$drug" + str(no) + " = array(\n")
                        for j in i:
                                f.write('\t\t"' + j + '",\n')
                        f.write(");\n\n")
                        no += 1
                f.write("?>")

if __name__ == "__main__":
        dizin = os.path.join(os.getcwd() , 'drugs' )
        if not os.path.isdir(dizin):
                os.mkdir(dizin)

        adress = 'http://www.ilacrehberi.com/cgi-bin/ilac_fihrist.asp?h='
        liste = [
                 "A", "B", "C", "Ç", "D", "E", "F", "G", "H", "I", "İ", "J", "K",
                 "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "W",
                 "X", "V", "Y", "Z", "AL", "AM", "AN", "BE", "CA", "CE", "CO", "DE",
                 "DI", "FL", "GE", "IN", "KA", "LA", "LI", "ME", "MI", "NA", "NI",
                 "NO", "PA", "PE", "SE", "SI", "TR", "VI"
        ]
        liste = ['A']
        total = 0
        main_list = []
        for i in liste:
                print '%s adresli sayfa indiriliyor...' %i
                #page = site_oku(adress + i)
                page = file(i).read()
                print '%s adresli sayfa okunuyor...' %i
                new_list = parcala(page)
                dosyala(dizin, i, new_list)
                total += len(new_list)
                main_list.append(new_list)
                print '%s adresli sayfa dosyalandı » ./drugs/%s...\n' %(i, i)

        print "toplam ilaç sayısı %s\n" %total

        print "php kodu üretiliyor..."
        php(main_list)
        print "php kodu üretildi » ./drug.php"

