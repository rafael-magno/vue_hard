<?php

use Base\AlunoHasDisciplina as BaseAlunoHasDisciplina;

/**
 * Skeleton subclass for representing a row from the 'aluno_has_disciplina' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class AlunoHasDisciplina extends BaseAlunoHasDisciplina
{
	private $query;
	
	function __construct()
	{
		$this->query = new AlunoHasDisciplinaQuery();
	}
	
	public function removeByIdaluno($idaluno)
	{
		$this->query->filterByAlunoIdaluno($idaluno)->delete();
	}
}
