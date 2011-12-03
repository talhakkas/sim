#!/usr/bin/env python
#-*- coding:utf-8-*-

from Tkinter import *
import ImageTk
penc=Tk()
baslik1=penc.title("BULGU PENCERESI")
penc.geometry("600x400+15+100")

def temizle():
    isim.delete(0,END)
    numara.delete(0, END)
    
def kaydet():
    
    metin1=isim.get()
    metin2=numara.get()
    if (metin1 == "") or (metin2 == ""):
        penc7 = Toplevel()
        baslik7 = penc7.title("UYARI!!")
        penc7.geometry("300x50+90+250")
        etiket= Label(penc7, text="Lutfen Bosluklari doldurunuz...", font= "Times 14")
        etiket.pack()
        buton7=Button(penc7,text="TAMAM", command = penc7.destroy, bg="red", fg="white")
        buton7.pack(side=BOTTOM)
    else :
        dosya= open("BULGU_SINAVI.txt","a")
        dosya.write("\n\n")
        dosya.write(metin2)
        dosya.write("\t")
        dosya.write(metin1)

        dosya.close()
    
def film_getir():
    penc2 = Toplevel()
    baslik2 = penc2.title("Rontgen Filmi")
    penc2.geometry("700x650+700+15")
    buton6=Button(penc2,text="CIKIS", command = penc2.destroy, bg="red", fg="white")
    buton6.pack(side=BOTTOM)

    buton13=Button(penc2,text="Rontgen Degerlendir", command = r_degerlendir, bg="red", fg="white")
    buton13.pack(side=BOTTOM)
    
    film = ImageTk.PhotoImage(file = "img/cardiomegaly3male55MildAP.jpg")
    ekran = Label(penc2, image = film)
    
    ekran.pack()
    mainloop()
    

def tahlil_getir():
    penc3 = Toplevel()
    baslik3 = penc3.title("Tahlil Ciktisi")
    penc3.geometry("425x650+900+15")


    film = ImageTk.PhotoImage(file = "img/tahlil.jpg")
    ekran = Label(penc3, image = film)

    ekran.place(relx=0.0, rely=0.0)
    
    buton7=Button(penc3,text="CIKIS", command = penc3.destroy, bg="red", fg="white")
    buton7.pack(side=BOTTOM)
    buton8=Button(penc3,text="DEGERLENDIR", command = t_degerlendir, bg="red", fg="white")
    buton8.pack(side=BOTTOM)

    mainloop()
    
def t_degerlendir():
    penc4 = Toplevel()
    baslik4 = penc4.title("Tahlil Degerlendirme")
    penc4.geometry("750x350+800+15")

    etiket1 = Label(penc4, text="Tahlilde gordugunuz normal olmayan durumlari belirtiniz:", font="Times 13")
    etiket1.place(relx=0.0, rely= 0.0)

    t_sorun = Text(penc4, height=5, width=80, font="Helvetica 13")
    t_sorun.place(relx=0.01, rely=0.08)

    
    etiket2 = Label(penc4, text="tedavi yontemini ve kullanilacak ilaclari belirtiniz:", font="Times 13")
    etiket2.place(relx=0.0, rely= 0.42)

    t_tedavi=Text(penc4, height=5, width=80, font="Helvetica 13")
    t_tedavi.place(relx=0.01, rely=0.5)

    buton9=Button(penc4,text="KAYDET", command = deger_kaydi, bg="red", fg="white")
    buton9.pack(side=BOTTOM)
    buton9=Button(penc4,text="CIKIS", command = penc4.destroy, bg="red", fg="white")
    buton9.pack(side=BOTTOM)
    
def r_degerlendir():
    penc5 = Toplevel()
    baslik5 = penc5.title("Tahlil Degerlendirme")
    penc5.geometry("750x350+800+15")

    etiket1 = Label(penc5, text="Frontgen filminde gordugunuz normal olmayan durumlari belirtiniz:", font="Times 13")
    etiket1.place(relx=0.0, rely= 0.0)

    r_sorun = Text(penc5, height=5, width=80, font="Helvetica 13")
    r_sorun.place(relx=0.01, rely=0.08)

    
    etiket2 = Label(penc5, text="tedavi yontemini ve kullanilacak ilaclari belirtiniz:", font="Times 13")
    etiket2.place(relx=0.0, rely= 0.42)

    r_tedavi=Text(penc5, height=5, width=80, font="Helvetica 13")
    r_tedavi.place(relx=0.01, rely=0.5)

    buton9=Button(penc5,text="KAYDET", command = deger_kaydi, bg="red", fg="white")
    buton9.pack(side=BOTTOM)
    buton9=Button(penc5,text="CIKIS", command = penc5.destroy, bg="red", fg="white")
    buton9.pack(side=BOTTOM)


def deger_kaydi():
    metin1 = r_sorun.get()
    metin2 = r_tedavi.get
    if (metin1 == "") or (metin2 == ""):
        penc7 = Toplevel()
        baslik7 = penc7.title("UYARI!!")
        penc7.geometry("300x50+90+250")
        etiket= Label(penc7, text="Lutfen Bosluklari doldurunuz...", font= "Times 14")
        etiket.pack()
        buton7=Button(penc7,text="TAMAM", command = penc7.destroy, bg="red", fg="white")
        buton7.pack(side=BOTTOM)
    else :
        dosya= open("BULGU_SINAVI(degerlendirme).txt","a")
        dosya.write("\n\n")
        dosya.write(metin2)
        dosya.write("\t")
        dosya.write(metin1)

        dosya.close()

def n_calisir():
    penc6 = Toplevel()
    baslik6 = penc6.title("Bilgi Penceresi")
    penc6.geometry("500x300+900+15")


    etiket1 = Label(penc6, text ="-  Oncelikle isim ve numaranizi yazdiktan sonra 'Giris Yap' butonuyla\n\
    ogrencinin katilimi 'BULGU_SINAVI.txt' dosyasina kaydedilir.\n\n", font="Times 13" )
    etiket1.place(relx=0.0,rely=0.0)

    etiket2 = Label(penc6,text ="-  RONTGEN ya da TAHLIL secenekleri tiklandiginda acilan\n pencerede ilgili bulgunun\
    resmi acilir.\n\n",font="Times 13" )
    etiket2.place(relx=0.0,rely=0.3)

    etiket3 = Label(penc6,text ="-'Tahlil Degerlendirme' ve 'Rontgen Degerlendirme' butonlari\n tiklanarak acilan pencerede\
    ilgili bolume degerlendirme ve tedavi \nbilgileri yazilir.\n\n" , font="Times 13" )
    etiket3.place(relx=0.0,rely=0.5)

    etiket4 = Label(penc6,text ="-   'Kaydet' butonu tiklanarak bilgiler 'Degerlendirme' dosyasinin \n icerisine kaydedilir." , font="Times 13" )
    etiket4.place(relx=0.0,rely=0.7)
    

    buton12=Button(penc6,text="TAMAM", command = penc6.destroy, bg="red", fg="white")
    buton12.pack(side=BOTTOM)
    

etiket = Label(text = "HASTA BULGU EKRANI\nDEGERLENDIRME CALISMASI",font="Times 23 bold")
etiket.pack()

etiket = Label(text ="Lutfen kisisel bilgilerinizi giriniz:",font="Times 15" )
etiket.place(relx=0.0 , rely=0.22)

etiket = Label(text="ISIM:",font="Times" )
etiket.place(relx=0.0 , rely=0.3)

etiket = Label(text ="NUMARA:",font="Times" )
etiket.place(relx=0.55 , rely=0.3)


isim = Entry()
isim.place(relx=0.1, rely=0.3)

numara= Entry()
numara.place(relx=0.7, rely=0.3)



buton1= Button(text="Temizle", command=temizle)
buton1.place(relx=0.25 ,  rely=0.4)

buton2= Button(text="Giris Yap", command=kaydet)
buton2.place(relx=0.6 ,  rely=0.4)

buton3= Button(text="RONTGEN", command=film_getir)
buton3.place(relx=0.0 ,  rely=0.7)

buton4= Button(text="TAHLIL", command=tahlil_getir)
buton4.place(relx=0.3 ,  rely=0.7)

buton5= Button(text="CIKIS", command=penc.destroy, bg="red", fg="white")
buton5.place(relx=0.6 ,  rely=0.7)
buton11=Button(text="Nasil Calisir", command = n_calisir)
buton11.place(relx=0.8 , rely=0.7)
mainloop()
