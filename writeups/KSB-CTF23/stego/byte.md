# KSB-CTF23 - stego - byte


# Introduction

[Файл](files/byte.txt)


# Solve

Открываем файл и видим следующее:


```
So how did the classical Latin become so incoherent? According to McClintock, a 15th century typesetter likely scrambled part of Cicero's De Finibus in order to provide placeholder text to mockup various fonts for a type specimen book.

It's difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn't relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.

And anyways, as Cecil Adams reasoned, “[Do you really] think graphic arts supply houses were hiring classics scholars in the 1960s?” Perhaps. But it seems reasonable to imagine that there was a version in use far before the age of Letraset. 
     	  	 		
     	 	  		
     	    	 
     				 		
     		    	
      		 		 
     		  	  
      			  	
      		   	
      		 	 	
     		   	 
      		 	 	
      		 		 
      			   
      		   	
      		   	
      		  	 
      		   	
      		 	 	
      		 		 
      		 			
      		 	  
      			   
      		 	  
     		  		 
      		 			
      		 	  
     		   		
      		  	 
     		  	  
      		 			
     		    	
      		   	
     		   	 
     		   		
      		    
     					 	
    

```

Если у вас редактор выделяет табы и пробелы, то можно заметить, что все поля не пустые, и они заполнены ими. Добро пожаловать в whitespace coding)

Копируем весь текст в какую-нибудь whitespace online IDE и получаем следующее:

```
[0] SS SSSTSSTSTTL (push 75)
[1] SS SSSTSTSSTTL (push 83)
[2] SS SSSTSSSSTSL (push 66)
[3] SS SSSTTTTSTTL (push 123)
[4] SS SSSTTSSSSTL (push 97)
[5] SS SSSSTTSTTSL (push 54)
[6] SS SSSTTSSTSSL (push 100)
[7] SS SSSSTTTSSTL (push 57)
[8] SS SSSSTTSSSTL (push 49)
[9] SS SSSSTTSTSTL (push 53)
[10] SS SSSTTSSSTSL (push 98)
[11] SS SSSSTTSTSTL (push 53)
[12] SS SSSSTTSTTSL (push 54)
[13] SS SSSSTTTSSSL (push 56)
[14] SS SSSSTTSSSTL (push 49)
[15] SS SSSSTTSSSTL (push 49)
[16] SS SSSSTTSSTSL (push 50)
[17] SS SSSSTTSSSTL (push 49)
[18] SS SSSSTTSTSTL (push 53)
[19] SS SSSSTTSTTSL (push 54)
[20] SS SSSSTTSTTTL (push 55)
[21] SS SSSSTTSTSSL (push 52)
[22] SS SSSSTTTSSSL (push 56)
[23] SS SSSSTTSTSSL (push 52)
[24] SS SSSTTSSTTSL (push 102)
[25] SS SSSSTTSTTTL (push 55)
[26] SS SSSSTTSTSSL (push 52)
[27] SS SSSTTSSSTTL (push 99)
[28] SS SSSSTTSSTSL (push 50)
[29] SS SSSTTSSTSSL (push 100)
[30] SS SSSSTTSTTTL (push 55)
[31] SS SSSTTSSSSTL (push 97)
[32] SS SSSSTTSSSTL (push 49)
[33] SS SSSTTSSSTSL (push 98)
[34] SS SSSTTSSSTTL (push 99)
[35] SS SSSSTTSSSSL (push 48)
[36] SS SSSTTTTTSTL (push 125)
[37] SS SSL (push 0)
```

Берём каждое число из **push**. Т.е. 75 83 66 123 97 ... и переводим их из ascii кода, в символы)

Получаем флаг : `Не все флаги я сохранял, поэтому можете проделать сами)` 


# Spoiler

Смотрим whitespace код и декодируем флаг