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
        with open(dizin + '/' + file_name, 'w') as dosya:
                for i in liste:
                        dosya.write(i+'\n')

if __name__ == "__main__":
        dizin = os.path.join(os.getcwd() , 'drugs' )
        if not os.path.isdir(dizin):
                os.mkdir(dizin)

        adress = 'http://www.ilacrehberi.com/cgi-bin/ilac_fihrist.asp?h='
        liste = [
                 "A", "B", "C", "Ç", "D", "E", "F", "G", "H", "I", "İ", "J", "K", "L",
                 "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "W", "X",
                 "V", "Y", "Z", "AL", "AM", "AN", "BE", "CA", "CE", "CO", "DE", "DI",
                 "FL", "GE", "IN", "KA", "LA", "LI", "ME", "MI", "NA", "NI", "NO", "PA",
                 "PE", "SE", "SI", "TR", "VI"
        ]
        total = 0
        for i in liste:
                print '%s adresli sayfa indiriliyor...' %i
                page = site_oku(adress + i)
                print '%s adresli sayfa okunuyor...' %i
                new_list = parcala(page)
                dosyala(dizin, i, new_list)
                total += len(new_list)
                print '%s adresli sayfa dosyalandı » ./drugs/%s...\n' %(i, i)
        print "toplam ilaç sayısı %s" %total

