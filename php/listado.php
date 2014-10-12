
<?php
include_once("php/conex.php");
include_once("php/persona.php");

$list = new Listado();
echo $list->getTable();

class Listado {
	public $tablaCompleta;
	public $cantColumnas;
	public $tablaArrayNombres = array();
	public $conex;
	public $consulta;
	public $result;
	public $cantRows;
	
	public function __construct() {
		$this->conex = new MySQL();
		$this->consulta = "SELECT * FROM PERSONA;";
		$this->result = $this->conex->consulta($this->consulta);
		$this->cantRows = mysql_num_rows($this->result);
		$this->cantColumnas = mysql_num_fields($this->result);
		
		
		//mysql_fetch_assoc ( $devCapitulo );
	}
	
	public function getHeader() {
		return "
				<thead>
					<tr>
						<th style='width: 40px;' class='footable-first-column' title='Prueba de Listas' data-sort-ignore='true'>Foto</th>
						<th  data-toggle='true'>Apellido</th>
						<th >Nombre</th>
						<th data-hide='phone'>Edad</th>
						<th data-hide='phone'>Zona</th>
						<th data-hide='phone'>Sexo</th>
						<th class='footable-last-column' data-sort-ignore='true' style='width: 40px !important;'>Perfil</th>
					</tr>
				</thead>
				";
	}
	
	public function getListado() {
		$temp = "<tbody>";
		$resultado = mysql_fetch_assoc($this->result);
		while ($resultado) {
			$persona = new Persona($resultado['id']);
			$temp .= "<tr>";
			$temp .= "<td>";
			$temp .= "<img alt='' src='".$persona->getFoto()."' width='40'>";
			$temp .= "</td>";
			$temp .= "<td>".$persona->getApellido()."</td>";
			$temp .= "<td>".$persona->getNombre()."</td>";
			$temp .= "<td>".$persona->getEdad()."</td>";
			$temp .= "<td>CABA</td>";
			$temp .= "<td>Masculino</td>";
			$temp .= "<td><a href='#'>Ver</a></td>";
			$temp .= "</tr>";
			$resultado = mysql_fetch_assoc($this->result);
		} 
		$temp .= "</tbody>";
		return $temp;
	}
	
	public function getFooter() {
		$temp = "<tfoot>
					<tr>
						<td colspan='7'>
							<div  class='pagination pagination-centered hide-if-no-paging'></div>
						</td>
					</tr>
				</tfoot>";

		return $temp;
	}
	public function getTable() {
		$temp = "<p class='buscarTable'><input id='filter' type='text' placeholder='Buscar...'/></p>";
		$temp .= "<table class='tablaDemo breakpoint table toggle-circle toggle-medium' data-page-size='10' data-filter='#filter' data-filter-text-only='true'>";
		$temp .= $this->getHeader();
		$temp .= $this->getListado();
		$temp .= $this->getFooter();
		$temp .= "</table>";
		
		$temp .= "<script type='text/javascript'>
					$(function () {
						$('.tablaDemo').footable({
							addRowToggle: true
							})
					});
				</script>";
		return $temp;
	}
	
}



?>