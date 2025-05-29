<?php

class Cliente{
    private ?int $id;
    private string $nome;
    private string $cpf;
    private bool $ativo;
    private string $DataDeNascimento;

    public function __construct(?int $id, string $nome, string $cpf, bool $ativo, string $DataDeNascimento )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->ativo = $ativo;
        $this->DataDeNascimento = $DataDeNascimento;
    }

    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getCPF(): string { return $this->cpf; }
    public function getAtivo(): bool { return $this->ativo; }
    public function getDataDeNascimento(): string { return $this->DataDeNascimento; }

    public function setNome(string $nome) { $this->nome = $nome; }
    public function setCPF(string $cpf) { $this->$cpf = $cpf; }
    public function setAtivo(bool $ativo) { $this->ativo = $ativo; }
    public function setDataDeNascimento(string $DataDeNascimento) { $this->DataDeNascimento = $DataDeNascimento; }

}