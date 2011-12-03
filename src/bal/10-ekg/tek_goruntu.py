#!/usr/bin/python
# -*- coding: utf-8 -*-



from Tkinter import *
import ImageTk

pencerem = Tk()
baslik = pencerem.title("EKG Görüntüleme")
pencerem.geometry("600x600")

class Test(object) :

    
    
    def __init__(self) :
        
        self.buton1 = Button (text = "EKG"  ,command = self.ekg_gor , fg = "red" , bg = "black")
        self.buton1.pack()
        self.buton3 = Button (text = "cikis" , command = pencerem.destroy , fg = "red" , bg = "black")
        self.buton3.pack()
    
    def ekg_gor(self):
        
        resim_tut = ImageTk.PhotoImage(file = "13-ekg-cek.jpg")
        ekranda_gor = Label(image = resim_tut)
        ekranda_gor.pack()
        mainloop()


run = Test()
mainloop()

