.PHONY: all re clean fclean

BIN_NAME		=	105torus

all:
	echo "#!/usr/bin/env php" > $(BIN_NAME)
	cat src/$(BIN_NAME).php >> $(BIN_NAME)
	chmod 711 $(BIN_NAME)

re: fclean all

clean:
	rm -f *.o

fclean:
	rm -f $(BIN_NAME)