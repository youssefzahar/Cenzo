<?php 
class Menu{
		private $id;
		private $nom_plat;
        private $prix_plat;
		private $image_plat;
    

		public function __construct($nom_plat,$prix_plat,$image_plat){
        $this->nom_plat=$nom_plat;
        $this->prix_plat=$prix_plat;
		$this->image_plat=$image_plat;
       
		}
		public function getid(){
			return $this->id;
		}
		public function getNom_plat(){
			return $this->nom_plat;
		}
		public function getPrix_plat(){
			return $this->prix_plat;
		}
		public function getImage_plat(){
			return $this->image_plat;
		}
		
		public function setid($id){
			$this->id=$id;
		}
		public function setNom_plat($nom_plat){
			$this->nom_plat=$nom_plat;
		}
		public function setPrix_plat($prix_plat){
			$this->prix_plat;
        }
		public function setImage_plat($Image_plat){
			$this->Image_plat=$Image_plat;
		}
        }

?>