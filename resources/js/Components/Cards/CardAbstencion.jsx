import React from 'react'
import Card from 'react-bootstrap/Card';
import Carousel from 'react-bootstrap/Carousel';

const CardAbstencion = (props) => {
    return (
        <Carousel indicators={true} controls={false} slide={true} fade={true} interval={9000}>
            <Carousel.Item>
                <Card className="card-homepage">
                    <Card.Header>Um Manifesto Contra a Abstenção</Card.Header>
                    <Card.Body>
                        <div>
                            A abstenção nas últimas eleições autárquicas em Portugal situou-se <span className="empathize-homepage">nos 47%</span>.
                            <br />
                            <br />
                            <span className="empathize-homepage"> Mais de 4 milhões de eleitores não foram às urnas.</span>
                            <br />
                            <br />
                            A abstenção é um problema sério que afeta a democracia e a representação política.
                            Urge encontrar soluções para combater a abstenção e incentivar a participação de todos os cidadãos, <span className="empathize-homepage">sobretudo os mais jovens.</span>
                        </div>
                    </Card.Body>
                </Card>
            </Carousel.Item>
            <Carousel.Item>
                <Card className="card-homepage">
                    <Card.Header>A Importância do Poder Local</Card.Header>
                    <Card.Body>
                        Por vezes esquecido, o poder local <span className="empathize-homepage">é uma das maiores conquistas de abril.</span>
                        <br />
                        <br />
                        Existe "...uma clara associação estatística entre desenvolvimento e descentralização, <span className="empathize-homepage"><a href="https://www.parlamento.pt/Documents/2019/julho/descentralizacao/Relatorio-Final-descentralizacao.pdf">países mais desenvolvidos são mais descentralizados que os países mais centralistas."</a></span> - OCDE, 2019
                        <br />
                        <br />
                        Com a crescente descentralização das competências do estado, os autarcas têm um papel fundamental na vida dos cidadãos, assumindo cada vez mais funções estratégicas que requerem uma maior responsabilidade e escrutínio público.
                    </Card.Body>
                </Card>
            </Carousel.Item>
            <Carousel.Item>
                <Card className="card-homepage" >
                    <Card.Header>O Que Podemos Fazer?</Card.Header>
                    <Card.Body>
                        Ao contrário das restantes eleições partidárias, onde nos últimos anos o advento da IA Generativa <span className="empathize-homepage">permitiu o surgimento de multiplas plataformas para uma análise gamificada aos programas eleitorais</span>.
                        As eleições autárquicas continuam, contudo, <span className="empathize-homepage">a ser o parente pobre do processo eleitoral português</span> no que concerne ao desenvolvimento de plataformas digitais que apelem à participação das massas na política.
                        <br />
                        <br />
                        Lançado a tempo das eleições autárquicas de 2025, esperamos que este portal seja um ponto de partida para uma maior participação dos cidadãos no processo eleitoral autárquico. Ao promover o conhecimento do poder local, esperamos combater a abstenção e aumentar a participação cívica.
                    </Card.Body>
                </Card>
            </Carousel.Item>
        </Carousel>
    )
}

export default CardAbstencion