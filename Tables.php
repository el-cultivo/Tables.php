<?php

/**
 * Clase para crear automáticamente las tablas de los index en el área de administración de los proyectos en Laravel de El Cultivo.
 *
 * 
 * 
 */
class CltvoIndexTable {
	public $columnas = [];
	public $data = [];
	public $table_class = 'indexTable';
	public $table_head_class = 'indexTable__head';//Se aplica al tr que contiene el th
	public $table_row_class = 'indexTable__head'; //Se aplica al tr que contiene el td

	/**
	 * Crear la instancia de la tabla
	 *
	 * @param array $columnas Array asociativo entre el nombre de la columna y la class CSS que determinará su ancho
	 * @param array $data     Array con los datos de cada una de las filas de tabla
	 */
	public function __construct(array $columnas, array $data) {
		$this->columnas = $columnas;
		$this->data = $data;
	}

	/**
	 * Permite cambiar la clase CSS de la tabla
	 * @param  string $class La clase
	 * @return void        
	 */
	public function tableClass($class) {
		$this->table_class;
	}

	/**
	 * Permita cambiar la clase de la fila que encabezado de la tabla
	 * @param  string $class La clase
	 * @return void        
	 */
	public function tableHeadClass($class) {
		$this->table_head_class;
	}

	/**
	 * Permita cambiar la clase de las filas subsiguientes al encabezado de la tabla
	 * @param  string $class La clase
	 * @return void        
	 */
	public function tableRowClass($class) {
		$this->table_row_class;
	}

	/**
	 * Genera el HTML de la tabla.
	 *
	 * Genera un encabezado correspondiente a $this->columns y las filas subsiguientes que corresponden a $this->data
	 * 
	 * @return HTML  
	 */
	public function create() {
		?>
		<table class="<?php $this->table_class ?>">
<!-- TABLE HEADER -->
			<tr class="<?php $this->table_head_class ?>">
				<?php foreach ($this->columnas as $columna => $width): ?>
					<th class="<?php echo $width ?>"><?php echo $columna ?></th>
				<?php endforeach ?>
			</tr>
<!-- TABLE ROWS -->
			<?php foreach ($this->data as $row): ?>
				<tr class="<?php $this->table_row_class ?>">

					<?php $i = 0; foreach ( $this->columnas as $columna => $width): ?>
						<td>
							<?php 
								echo isset($row[$columna]) ?  $row[$columna] : '';
								
								if ($i == 0) {
									$this->rowOptions();
								}
							?>
						</td>
					<?php $i++; endforeach ?>
				</tr>
			<?php endforeach ?>
		</table>
		<?php
	}

	/**
	 * Genera las opciones que apareceran en la primera columna de cada una de las filas de la tabla (excepto el encabezado)
	 * 
	 * @return HTML Links a los controladores correspondientes
	 */
	private function rowOptions() {
		?>
		<div>
			<a href="mysitescontroller.com/post/edit">Editar</a>
			<a href="mysitescontroller.com/post/delete">Eliminar</a>
			<a href="mysitescontroller.com/post/show">Ver</a>
		</div>
		<?
	}

}



$columnas = [
	'nombre'	=> 	'grande-4',
	'año'	=> 	'grande-1',
	'colección'	=> 	'grande-4',
	'fecha de publicación'	=> 	'grande-3'
];

$musica_db_query = [
	'row1'	=> 	[
		'nombre'	=> 	'K.O at home',
		'disco'	=> 	'alguno',
		'colección'	=> 	'personal',
		'fecha de publicación' => '2016'

	], 

	'row2'	=> 	[
		'nombre'	=> 	'Women\'s song, rope repertoire',
		'año'	=> 	'1970',
		'autor'	=> 	'tradicional',
		'colección'	=> 	'ONU',
		'fecha de publicación' => '2016'
	]
];

$tabla = new CltvoIndexTable($columnas, $musica_db_query);
$tabla->create();
