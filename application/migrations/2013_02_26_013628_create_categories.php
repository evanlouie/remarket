<?php

class Create_Categories {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('categories', function($table) {
			$table->increments('id');
			$table->string('title');
		});
		$cat = new Categorie;
		$cat->title = "Wood";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Metal";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Ceramic";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Glass";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Fabric";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Plastic";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Concrete";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Appliances";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Electical";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Plumbing";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Insulation";
		$cat->save();
		$cat = new Categorie;
		$cat->title = "Other";
		$cat->save();
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('categories');
	}

}