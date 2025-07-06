import GenericLayout from '@/Layouts/GenericLayout'
import React from 'react'
import { Link } from '@inertiajs/react'
import Grid from '@mui/material/Grid';
import Breadcrumbs from '@mui/material/Breadcrumbs';
import Container from '@mui/material/Container';
import Accordion from 'react-bootstrap/Accordion';
import Image from 'react-bootstrap/Image';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import ruben from '/resources/images/ruben.png'
import sergio from '/resources/images/sergio.jpg'
import ricardo from '/resources/images/RC5.jpg'

const AboutUs = () => {
    const breadCrumbs = [
        <Link key="1" href={route("home")}>
            Início
        </Link>,
        <span key="2">Sobre Nós</span>
    ]

    return (
        <GenericLayout main={
            <Container maxWidth={false}>
                <Grid container direction="column" justifyContent="center">
                    <Grid item container direction="row" sx={{ alignItems: "center", mt: 2 }}>
                        <Grid item>
                            <Breadcrumbs separator=">" sx={{ mb: 2 }}>
                                {breadCrumbs}
                            </Breadcrumbs>
                        </Grid>
                    </Grid>
                    <Grid item container justifyContent="center">
                        <Grid item size={{ md: 9 }}>
                            <Accordion id="accordion-about-us" defaultActiveKey="4" alwaysOpen>
                                <Accordion.Item eventKey="0">
                                    <Accordion.Header>O que é a MinhaRegião.pt?</Accordion.Header>
                                    <Accordion.Body>
                                        <div className="accordion-content">
                                            A MinhaRegião.pt é uma plataforma desenvolvida por <a href="https://www.linkedin.com/in/almeida-ruben/" target="_blank">Rúben Almeida</a>, investigador de inteligência artificial e professor convidado na Faculdade de Engenharia da Universidade do Porto, no âmbito do Prémio Arquivo.pt 2025,
                                            com o objetivo de promover o conhecimento e a valorização das regiões de Portugal.
                                            Através de uma interface intuitiva, os utilizadores podem explorar informações sobre as suas regiões focando-se no histórico eleitoral autárquico.
                                        </div>
                                    </Accordion.Body>
                                </Accordion.Item>
                                <Accordion.Item eventKey="1">
                                    <Accordion.Header>Quais os Objetivos deste Projeto? </Accordion.Header>
                                    <Accordion.Body>
                                        <div className="accordion-content">
                                            O principal objetivo da MinhaRegião.pt é promover o envolvimento dos cidadãos no processo político local, através da disponibilização num ponto centralizado de informações sobre as eleições autárquicas em Portugal desde 1976.
                                        </div>
                                    </Accordion.Body>
                                </Accordion.Item>
                                <Accordion.Item eventKey="2">
                                    <Accordion.Header>Quem pode utilizar? É gratuito?</Accordion.Header>
                                    <Accordion.Body>
                                        <div className="accordion-content">
                                            O acesso à plataforma é gratuito e aberto a todos os cidadãos interessados em conhecer mais sobre as suas regiões e o histórico eleitoral autárquico de Portugal.
                                            Para além do acesso web, a plataforma também disponibiliza uma API para que investigadores e desenvolvedores possam pela primeira vez aceder a dados autárquicos de Portugal de forma estruturada e programática.
                                            Brevemente, o acesso via API será limitado a utilizadores registados e a uma quota de requisições diárias, para garantir a estabilidade e a segurança da plataforma.
                                            Contudo, os autores comprometem-se a fornecer acesso ilimitado a contas de investigadores e académicos previamente aprovados, para que possam utilizar os dados para fins de investigação e desenvolvimento.
                                        </div>
                                    </Accordion.Body>
                                </Accordion.Item>
                                <Accordion.Item eventKey="3">
                                    <Accordion.Header>Acesso via API</Accordion.Header>
                                    <Accordion.Body>
                                        <div className="accordion-content">
                                            A plataforma disponibiliza uma API RESTful com interface OpenAPI. É possivel aceder à documentação da API através do seguinte link: <a href="/api/docs" target="_blank">Documentação da API</a>.
                                        </div>
                                    </Accordion.Body>
                                </Accordion.Item>
                                <Accordion.Item eventKey="4">
                                    <Accordion.Header>Quem é a Equipa por trás da MinhaRegião.pt?</Accordion.Header>
                                    <Accordion.Body>
                                        <div className="accordion-content">
                                            <Row className="justify-content-center">
                                                <Col xs={12} md={4}>
                                                    <Image src={ruben} alt="Rúben Almeida" roundedCircle width={200} height={200} className="mb-3" />
                                                    <h2>Rúben Almeida</h2>
                                                    <h6>Prof. Assistente na Faculdade de Engenharia da U.Porto</h6>
                                                    <h6>Colaborador Externo INESC TEC</h6>
                                                    <h6>Autor MinhaRegião.pt</h6>
                                                </Col>
                                                <Col xs={12} md={4}>
                                                    <Image src={ricardo} alt="Ricardo Campos" roundedCircle width={200} height={200} className="mb-3" />
                                                    <h2>Ricardo Campos</h2>
                                                    <h6>Prof. Auxiliar na Universidade da Beira Interior</h6>
                                                    <h6>Investigador no INESC TEC</h6>
                                                    <h6>Orientador</h6>
                                                </Col>
                                                <Col xs={12} md={4}>
                                                    <Image src={sergio} alt="Sérgio Nunes" roundedCircle width={200} height={200} className="mb-3" />
                                                    <h2>Sérgio Nuens</h2>
                                                    <h6>Prof. Associado na Faculdade de Engenharia da U.Porto</h6>
                                                    <h6>Investigador no INESC TEC</h6>
                                                    <h6>Orientador</h6>
                                                </Col>
                                            </Row>
                                        </div>
                                    </Accordion.Body>
                                </Accordion.Item>
                                <Accordion.Item eventKey="5">
                                    <Accordion.Header>O Projeto tem Motivações Políticas?</Accordion.Header>
                                    <Accordion.Body>
                                        <div className="accordion-content">
                                            O autor da plataforma, Rúben Almeida, é um defensor da regionalização em Portugal e acredita que a criação de regiões administrativas pode trazer benefícios significativos para o país.
                                            Os orientadores não partilham necessariamente desta visão, mas apoiam o projeto como uma iniciativa de promoção do conhecimento e da participação cívica.
                                            <br />
                                            A plataforma é uma ferramenta neutra do ponto de vista partidário, destinada a informar os cidadãos sobre as suas regiões e o histórico eleitoral autárquico.
                                            <br />
                                            Não nos associamos a nenhum partido político ou movimento político, e víncula somente à promoção da participação cívica e do conhecimento sobre as regiões de Portugal.
                                        </div>
                                    </Accordion.Body>
                                </Accordion.Item>
                                <Accordion.Item eventKey="6">
                                    <Accordion.Header>Como é Financiado a MinhaRegião.pt?</Accordion.Header>
                                    <Accordion.Body>
                                        <div className="accordion-content">
                                            O desenvolvimento da plataforma foi feito pro bono pelo autor, motivado pelas suas convicções democráticas e pelo desejo de promover a regionalização em Portugal.
                                            Todos os custos associados à manutenção e alojamento da plataforma são suportados pelo autor.
                                            Sendo o valor pecuniário atribuído pelo prémio Arquivo.pt 2025, o garante de que a plataforma continuará a ser mantida e atualizada.
                                        </div>
                                    </Accordion.Body>
                                </Accordion.Item>
                                <Accordion.Item eventKey="7">
                                    <Accordion.Header>Como posso contactar a equipa?</Accordion.Header>
                                    <Accordion.Body>
                                        Utilize o nosso formulário de contacto disponível na página <Link href={route("contact-us")}>Contacte-nos</Link> ou envie-nos uma mensagem através do nosso perfil no <a href="https://www.linkedin.com/company/minha-regi%C3%A3o" target="_blank">LinkedIn</a>.
                                    </Accordion.Body>
                                </Accordion.Item>
                            </Accordion>
                        </Grid>
                    </Grid>
                </Grid>
            </Container>
        } />
    )
}

export default AboutUs
