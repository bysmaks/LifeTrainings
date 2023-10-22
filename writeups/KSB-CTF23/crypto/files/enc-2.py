f = open("flag.txt","r")
lines = f.readlines()
for c in lines[0]:
	print(ord(c)*2,"", end='')
