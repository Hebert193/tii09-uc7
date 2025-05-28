<?php

class Cliente{
    private ?int $id;
    private string $nome;
    private float $cpf;
    private bool $ativo;
    private string $dataNacimento;

    public function __construct(?int $id, string $nome, float $cpf, bool $ativo, string $dataNacimento )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->ativo = $ativo;
        $this->dataNacimento = $dataNacimento;
    }

    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getCPF(): float { return $this->cpf; }
    public function getAtivo(): bool { return $this->ativo; }
    public function getDataNacimento(): string { return $this->dataNacimento; }

    public function setNome(string $nome) { $this->nome = $nome; }
    public function setCPF(float $cpf) { $this->$cpf = $cpf; }
    public function setAtivo(bool $ativo) { $this->ativo = $ativo; }
    public function setDataNacimento(string $dataNacimento) { $this->dataNacimento = $dataNacimento; }

}