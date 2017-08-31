<div class = "general">

	<div class="titulo">
				<p class="texto-alumno"><?= $examen->clases_alumno->alumno ?></p>
	</div>
	<div class="titulo">
				<p class="texto-alumno"><?= h($examen->clases_alumno->clase->disciplina->descripcion) ?></p>
	</div>

</div>