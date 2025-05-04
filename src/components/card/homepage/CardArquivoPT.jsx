import React from 'react'
import Card from 'react-bootstrap/Card';
import GithubIcon from '@mui/icons-material/GitHub';
import Button from 'react-bootstrap/Button';

const CardArquivoPT = () => {
    return (
        <Card className="card-homepage">
            <Card.Header>O Prémio Arquivo.PT 2025</Card.Header>
            <Card.Body>
                O desenvolvimento do MinhaRegião.pt não seria possível sem a informação compilada pelo Arquivo.pt
                <br />
                <br />
                A indexação dos presidentes de cada autarquia, a extrapolação dos dados autárquicos para além da datação providenciada pela CNE (2001).
                Assim como o levantamento dos orgão de comunicação local permitindo a criação de uma coletânea de notícias sobres as eleições autárquicas em cada região de Portugal não seria possível sem o Arquivo.pt
                <br />
                <br />
                Visita o nosso repositório no GitHub para saber mais sobre o projeto e contribuir para o mesmo.
                <br />
                <Button variant="" href="https://github.com/arubenruben/arquivo-pt-main-web" target="_blank" rel="noopener noreferrer" className="mx-0 px-0">
                    <GithubIcon fontSize="large" />
                </Button>
            </Card.Body>
        </Card>
    )
}

export default CardArquivoPT
