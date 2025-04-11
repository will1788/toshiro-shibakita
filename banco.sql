CREATE TABLE dados (
    CaixaID int AUTO_INCREMENT PRIMARY KEY,
    NomeCaixa varchar(50),         -- Nome do caixa (identificador)
    Operador varchar(50),   -- Nome do operador responsável pelo caixa
    Localizacao varchar(150), -- Endereço ou identificação da localização do caixa na loja
    Setor varchar(50),         -- Seção ou corredor onde o caixa está localizado
    Host varchar(50)       -- Número ou identificador do terminal do caixa
);
