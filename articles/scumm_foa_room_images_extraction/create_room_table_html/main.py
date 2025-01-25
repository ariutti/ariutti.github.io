import os, csv

ROOM_IMAGES_FOLDER   = "../images/backgrounds"
ROOM_PALETTES_FOLDER = "../images/palettes"
RNAM_CSV = "RNAM.csv"

def enterFolderAndGetListOfImages( folder ):
	os.chdir( folder )
	#print( "Entering folder {}".format(os.getcwd()) )

	PNG_LIST = [f for f in os.scandir( os.getcwd()) if ( f.is_file() and f.name.lower().endswith(".png") ) ]
	return PNG_LIST


if __name__ == "__main__":
	currentDirectory = os.getcwd()
	CSV_FILE = os.path.join( currentDirectory, RNAM_CSV )
	ROOM_IMAGES_FOLDER_FULLPATH   = os.path.join( currentDirectory, ROOM_IMAGES_FOLDER)
	ROOM_PALETTES_FOLDER_FULLPATH = os.path.join( currentDirectory, ROOM_PALETTES_FOLDER)

	#get a list of all room images
	ROOM_IMAGES_LIST = enterFolderAndGetListOfImages( ROOM_IMAGES_FOLDER_FULLPATH )
	PALETTES_IMAGES_LIST = enterFolderAndGetListOfImages( ROOM_PALETTES_FOLDER_FULLPATH )

	os.chdir( currentDirectory )

	print(f'<table id="image_backgrounds_palettes_table">')

	with open( CSV_FILE, newline='') as csvfile:
		csvreader = csv.reader(csvfile, delimiter=',')

		# skip header
		next(csvreader)

		print(f"\t<tr>")
		print(f"\t<td>Room Number</td>")
		print(f"\t<td>Room Name</td>")
		print(f"\t<td>Room background Image</td>")
		print(f"\t<td>Palette</td>")
		print(f"\t</tr>")

		for i, row in enumerate( csvreader ):
			#print(f" row {i} - {row}")
			room_number = row[0].strip()
			room_name   = row[1].strip()

			background_image_name  = None
			palette_image_name  = None

			# look for corresponding image
			for f in ROOM_IMAGES_LIST:
				#print( f )
				#get room munber for file
				roomNumberImage = f.name.split("_")[0][4:]
				#print( roomNumberImage )

				if room_number == roomNumberImage:
					background_image_name = f.name
					break

			for f in PALETTES_IMAGES_LIST:
				#print( f )
				#get room munber for file
				roomNumberImage = f.name.split("_")[0][4:]
				#print( roomNumberImage )

				if room_number == roomNumberImage:
					palette_image_name = f.name
					break

			#print( f"{room_number}\t{room_name}\t{background_image_name}\t{palette_image_name}")

			print(f"\t<tr><td>{room_number}</td><td>{room_name}</td>")

			if room_name == "#N/A":
				print(f"\t<td>This room doesn't exists in game data.</td>")
			elif room_name == "end-volca" or room_name == "end-v2___" or room_name == "_________":
				print(f"\t<td>")
				print(f'\t<?php img("images/backgrounds/{background_image_name}", 2, "margin-top: 1ch; margin-bottom:1ch;");?>')
				print(f"\t</td>")
			else:
				print(f"\t<td>")
				print(f'\t<?php img("images/backgrounds/{background_image_name}", 80, "margin-top: 1ch; margin-bottom:1ch;");?>')
				print(f"\t</td>")

			print(f"\t<td>")
			print(f'\t<?php img("images/palettes/{palette_image_name}", 100, "margin-top: 2ch; margin-bottom:2ch;");?>')
			print(f"\t</td>")

			print(f"\t</tr>\n")

		print("</table>")




"""
		#skip the first CSV rows (descriptive)
		next(csvreader)
		next(csvreader)
		next(csvreader)
		next(csvreader)

	for f in IMAGE_LIST:
		print( f )
		#get room munber for file
		roomName = f.name.split("_")[0][4:]
		print( roomName )
"""
