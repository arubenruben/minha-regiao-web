import React from 'react'
import Accordion from 'react-bootstrap/Accordion';

const AccordionPlots = ({ plotVoters, plotAbstention }) => {
    return (
        <Accordion className="accordion-wikipedia" defaultActiveKey="0">
            <Accordion.Item eventKey="0">
                <Accordion.Header>
                    Número de Eleitores
                </Accordion.Header>
                <Accordion.Body>
                    <p className="ssn-subtitle">Como variou o número de eleitores desde 1974?</p>
                    {plotVoters}
                </Accordion.Body>
            </Accordion.Item>
            <Accordion.Item eventKey="1">
                <Accordion.Header>
                    Taxa de Abstenção
                </Accordion.Header>
                <Accordion.Body>
                    <p className="ssn-subtitle">Como variou a taxa de abstenção desde 1974?</p>
                    {plotAbstention}
                </Accordion.Body>
            </Accordion.Item>
        </Accordion>
    )
}

export default AccordionPlots