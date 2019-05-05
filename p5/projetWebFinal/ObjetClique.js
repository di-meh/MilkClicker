/*
		Cette classe modélise l'objet qui est au centre du jeu : la brique de lait.
*/
class ObjetClique {
	
	/*
		Le constructeur se compose de plusieurs arguments : 
			x  : position en X
			y  : position en Y
	*/
	constructor(x, y) {
		this.x = x;
		this.y = y;
		this.size = 125;

		this.image = loadImage('./img/Recipient.png');

		this.length = 401/4;
		this.height = 720/4;
	}

	/*
		Cette fonction permet l'affichage de l'objet en fonction des coordonnées mises en paramètres du constructeur
	*/
	display() {
		image(this.image, this.x, this.y, this.image.width/4, this.image.height/4);
	}

	/*
		Ces fonctions sont les accesseurs et mutateurs (getters setters) des paramètres de l'objet
	*/
	get X() {
		return this.x;
	}

	get Y() {
		return this.y;
	}

	get Length() {
		return this.length;
	}

	get Height() {
		return this.height;
	}

	get Size() {
		return this.size;
	}
}