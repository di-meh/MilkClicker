let score;
let Sscore = score + "";

let longueurCanvas = 600;
let largeurCanvas  = 700;

let magasinAmeliorations   = [];
let nbMagasinAmeliorations = 0;

let ameliorationsJoueur   = [];
let nbAmeliorationsJoueur = 0;

let bouton;

let tabAff = [];

/*
	Cette fonction permet de précharger les données de l'utilisateur avant de faire l'affichage. Elle détermine si une partie existe et si
	l'utilisateur possède des achats.
*/
function preload() {
	params = getURLParams();
	key = params.key;

	if (key) {
		AKey = split(key, 'k');
		if(AKey[0] > 0) {
			score = AKey[0];
		} else {
			score = 0;
		}
		AAmel = split(AKey[1], 'a');

		AAmelLoc1 = split(AAmel[0], 'b');
		AAmelLoc2 = split(AAmel[1], 'b');
		AAmelLoc3 = split(AAmel[2], 'b');
		AAmelLoc4 = split(AAmel[3], 'b');

		magasinAmeliorations[nbMagasinAmeliorations++] = new AmeliorationMagasin(
			500, 50,  parseFloat(AAmelLoc1[1]), "Main", nbMagasinAmeliorations, 1, 15,  208, 237, 163, 0);
		magasinAmeliorations[nbMagasinAmeliorations++] = new AmeliorationMagasin(
			500, 100, parseFloat(AAmelLoc2[1]), "Paire de mains", nbMagasinAmeliorations, 5, 20,  15,  209, 32, 0);
		magasinAmeliorations[nbMagasinAmeliorations++] = new AmeliorationMagasin(
			500, 150, parseFloat(AAmelLoc3[1]), "Automate", nbMagasinAmeliorations, 7, 17,  35,  143, 69, 0);
		magasinAmeliorations[nbMagasinAmeliorations++] = new AmeliorationMagasin(
			500, 200, parseFloat(AAmelLoc4[1]), "Etable", nbMagasinAmeliorations, 15, 23, 101, 145, 143, 0);

		Sscore = affScore(score + "");

		tabAff = [parseFloat(AAmelLoc1[0]), parseFloat(AAmelLoc2[0]), parseFloat(AAmelLoc3[0]), parseFloat(AAmelLoc4[0])];

		if(AKey[2]) {
			AAchats = split(AKey[2], 'a');
			console.log("AAchats : " + AAchats);
			console.log("AAchats.length : " + AAchats.length);
			for (let i = 0; i < AAchats.length; i++) {
				let tempAchats = split(AAchats[i], 'b');
				console.log("on a : " + tempAchats);
				for (let j = 0; j < tempAchats[1]; j++) {
					ameliorationsJoueur[nbAmeliorationsJoueur++] = magasinAmeliorations[tempAchats[0] - 1];
				}
			}
		}
	} else {
		score = 0;
		Sscore = affScore(score + "");

		magasinAmeliorations[nbMagasinAmeliorations++] = new AmeliorationMagasin(
			500, 50,  5, "Main", nbMagasinAmeliorations, 1, 15,  208, 237, 163, 0);
		magasinAmeliorations[nbMagasinAmeliorations++] = new AmeliorationMagasin(
			500, 100, 15, "Paire de mains", nbMagasinAmeliorations, 5, 20,  15,  209, 32, 0);
		magasinAmeliorations[nbMagasinAmeliorations++] = new AmeliorationMagasin(
			500, 150, 100, "Automate", nbMagasinAmeliorations, 7, 17,  35,  143, 69, 0);
		magasinAmeliorations[nbMagasinAmeliorations++] = new AmeliorationMagasin(
			500, 200, 1000, "Etable", nbMagasinAmeliorations, 15, 23, 101, 145, 143, 0);

		tabAff = [0, 0, 0, 0];
	}

}

/*
	Cette fonction permet de charger sur le Canvas les différents éléements de l'interface comme le bouton, les textes etc.
*/
function setup() {
	//background(255);
	frameRate(60);
	let canvas = createCanvas(longueurCanvas, largeurCanvas);

	canvas.parent("canvasJeu");

	objetCentre = new ObjetClique((longueurCanvas/3) - 50, (largeurCanvas/3) - 90);

	imageFond = loadImage('./img/Champ.jpg');

	textFont("Georgia");
	textSize(20);
	textAlign(CENTER, CENTER);

	buttonQuitter = createButton('Enregistrer et quitter');
	buttonQuitter.position(405, 685);
	buttonQuitter.mousePressed(function () {
		let a = genereClef();
		alert("Voici votre clef.\n Pour sauvegarder votre partie allez sur votre profil pour saisir la clef générée :\n" + a);
		window.location.href = "index.php?module=profil&action=sauvegarde&ks=" + a;
	});
	affichageAmeliorations();
}

/*
	Cette fonction dessine pour chaque frame les composants du jeu.
*/
function draw() {
	noStroke();
	image(imageFond, 0, 0, imageFond.width, imageFond.height);

	fill(0);

	text(Sscore, longueurCanvas/3, 20);
	
	text("Améliorations", 500, 20);
	affichageAmeliorations();

	objetCentre.display();

	ajoutClic();
	affStats(tabAff[0], tabAff[1], tabAff[2], tabAff[3]);
}

/*
	Cette fonction permet d'aller chercher l'objet amélioration et d'appeler sa fonction d'affichage, pour chaque amélioration existante
*/
function affichageAmeliorations() {
	for(let i = 0; i < nbMagasinAmeliorations; i++) {
		magasinAmeliorations[i].display();
	}
}

/*
	Cette fonction ajoute à chaque frame la valeur de chaque amélioration possédée par le joueur au score total
*/
function ajoutClic() {
	let a = 0;
	let b = 0;
	let c = 0;
	let d = 0;

	let temp;

	if(nbAmeliorationsJoueur > 0) {
		if(frameCount % 2 == 0) {
			for(let i = 0; i < nbAmeliorationsJoueur; i++) {

				score *= 10;
				score += ameliorationsJoueur[i].Valeur / 60;
				score /= 10;

				Sscore = affScore(score);

				switch(ameliorationsJoueur[i].Id) {
					case 1:
					a++;
					break;
					case 2:
					b++;
					break;
					case 3:
					c++;
					break;
					case 4:
					d++;
					break;
				}
			}
			tabAff = [a, b, c, d];
		}
	}
}

/*
	Cette fonction est appelée pour afficher le nombre possédé d'améliorations pour chaque amélioration disponible
*/
function affStats(a, b, c, d) {
	fill(0);
	text(a, 480, 60);
	text(b, 480, 110);
	text(c, 480, 160);
	text(d, 480, 210);
}

/*
	Cette fonction converti le score de type double en String pour gérer les décimales inutiles à la compréhension du jeu
*/
function affScore(chaine) {
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
	Cette fonction est appelée lorsque le bouton est appelé pour générer la clef qui permet de savoir ou en est le joueur.
*/
function genereClef() {
	let clef = Sscore + "k";
	let val = 0;

	let tblVerifDouble = [];

	for (let i = 0; i < magasinAmeliorations.length; i++) {
		clef = clef + magasinAmeliorations[i].GNbAchats + "b" + magasinAmeliorations[i].GSPrix + "a";
	}

	clef = clef + "k";

	for (let i = 0; i < ameliorationsJoueur.length; i++) {
		console.log("On génère pour l'amélioration : " + ameliorationsJoueur[i].Id + ", nommée : " + ameliorationsJoueur[i].TexteAmelioration);
		
		let vrai = 0;
		for (let k = 0; k < tblVerifDouble.length; k++) {
			if(ameliorationsJoueur[i].Id == tblVerifDouble[k]) {
				vrai = 1;
			}
		}

		if(vrai == 0) {
			tblVerifDouble.push(ameliorationsJoueur[i].Id);
			for (let j = 0; j < ameliorationsJoueur.length; j++) {
				if(ameliorationsJoueur[i].Id == ameliorationsJoueur[j].Id) {
					val++;
				}
			}
			console.log("On en a trouvé " + val + " améliorations similaires");
			clef = clef + ameliorationsJoueur[i].Id + "b" + val + "a";
			val = 0;
		}
	}
	clef = clef + "k"
	console.log("la clef générée est : " + clef);
	return clef;
	/*
	$sql = "select ...";
	$db = new PDO ( "mysql:$dbname", $user, $password) ;
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();

	file_put_contents("output.txt", json_encode($result));
	*/
}

/*
	Cette fonction détermine si l'utilisateur peut acheter une amélioration, si oui alors elle est ajoutée à l'inventaire du joueur
*/
function achatAmelioration(id) {
	for(let i = 0; i < nbMagasinAmeliorations; i++) {
		if(id == magasinAmeliorations[i].Id) {
			if(score >= magasinAmeliorations[i].GPrix) {
				score -= magasinAmeliorations[i].GPrix;
				ameliorationsJoueur[nbAmeliorationsJoueur++] = magasinAmeliorations[i];
				magasinAmeliorations[i].augmentationPrix();
				magasinAmeliorations[i].IncNbAchats();
			}
		}
	}
}

/*
	Cette fonction permet d'effectuer une action à chaque clic souris, pour déterminer les coordonnées et donc si il y a un trigger d'activé
*/
	function mouseClicked() {
		let xSouris = mouseX;
		let ySouris = mouseY;

		if(xSouris >= objetCentre.X && xSouris <= objetCentre.X + objetCentre.Length
			&&
			ySouris >= objetCentre.Y && ySouris <= objetCentre.Y + objetCentre.Height) {
			score++;
			Sscore = affScore(score);
		} else {
			if(xSouris >= 500) {
				for(let i = 0; i < nbMagasinAmeliorations; i++) {
					if(xSouris >= (magasinAmeliorations[i].X - (magasinAmeliorations[i].Size)) && xSouris <= (magasinAmeliorations[i].X + (magasinAmeliorations[i].Size))
						&&
						ySouris >= (magasinAmeliorations[i].Y - (magasinAmeliorations[i].Size)) && ySouris <= (magasinAmeliorations[i].Y + (magasinAmeliorations[i].Size))) {
						achatAmelioration(magasinAmeliorations[i].Id);
				}
			}
		}
	}
}