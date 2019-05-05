/*
		Cette classe modélise l'objet des améliorations du magasin.
*/
class AmeliorationMagasin {
	/*
		Le constructeur se compose de plusieurs arguments : 
			x  : position en X
			y  : position en Y
			p  : prix de l'amélioration
			t  : texte de l'amélioration
			i  : id de l'amélioration
			v  : valeur de l'amélioration
			c  : pourcentage d'augmentation à chaque achat de l'amélioration
			r  : rouge de la couleur de l'application
			g  : vert de la couleur de l'application
			b  : bleu de la couleur de l'application
			nb : nombre de fois ou l'amélioration a été achetée
	*/
	constructor(x, y, p, t, i, v, c, r, g, b, nb) {
		this.x = x;
		this.y = y;
		this.size = 25;

		this.prix = p;
		this.Sprix = p + "";

		this.texte = t;

		this.id = i;

		this.valeur = v;

		this.pourcentage = c;

		this.nbAchats = nb;

		this.red = r;
		this.green = g;
		this.blue = b;
	}

	/*
		Cette fonction permet l'affichage de l'objet en fonction des coordonnées mises en paramètres du constructeur
	*/
	display() {
		fill(this.red, this.green, this.blue);

		square(this.x, this.y, this.size, this.size);
		
		text(this.Sprix, this.x + this.size + 30, this.y + 10);
		
		text(this.texte, this.x + 5, this.y + this.size + 12);
	}

	/*
		Cette fonction augmente le prix à chaque achat en fonction du pourcentage de base
	*/
	augmentationPrix() {
		let precalc = (this.prix * (this.pourcentage/100));
		
		this.prix+= precalc;
		this.Sprix = this.affScore(this.prix);
	}

	/*
		Cette fonction affiche le score en le convertissant de double à Integer
	*/
	affScore(chaine) {
		let tmp = chaine + "";
		let tmp1 = split(tmp, '.');

		if(tmp1.length > 1) {
			tmp = tmp1[1] + "";

			let tmp2 = tmp1[0];
			let tmp3 = split(tmp, '');

			if(tmp3[0] != 0) {
				if(tmp3[1] != 0) {
					return tmp2 + "." + tmp3[0] + tmp3[1];
				} else {
					return tmp2 + "." + tmp3[0];
				}
			} else {
				if(tmp3[1] != 0) {
					return tmp2 + "." + tmp3[0] + tmp3[1];
				} else {
					return tmp2;
				}
			}
		} else {
			return tmp1[0];
		}
	}


	/*
		Ces fonctions sont les accesseurs et mutateurs (getters setters) des paramètres de l'objet
	*/
	get Pourcentage() {
		return this.pourcentage;
	}

	get Id() {
		return this.id;
	}

	get GPrix() {
		return this.prix;
	}

	set SetPrix(p) {
		this.prix = p;
	}

	get GNbAchats() {
		return this.nbAchats;
	}

	set SetNbAchats(n) {
		this.nbAchats = n;
	}

	IncNbAchats() {
		this.nbAchats++;
	}

	get GSPrix() {
		return this.Sprix;
	}

	get Valeur() {
		return this.valeur;
	}

	set SetValeur(v) {
		this.valeur = v;
	}

	get X() {
		return this.x;
	}

	get Y() {
		return this.y;
	}

	get Size() {
		return this.size;
	}

	get TexteAmelioration() {
		return this.texte;
	}
}