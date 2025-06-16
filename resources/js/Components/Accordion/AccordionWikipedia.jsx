import React from 'react'
import Accordion from 'react-bootstrap/Accordion';

const AccordionWikipedia = ({ name, wikipedia }) => {
    return (
        <Accordion className="accordion-wikipedia">
            <Accordion.Item eventKey="0">
                <Accordion.Header>{name ?? wikipedia?.title}</Accordion.Header>
                <Accordion.Body>
                    {wikipedia?.summary}
                    <br />
                    <a href={wikipedia?.wikipedia_url} target="_blank" rel="noopener noreferrer">Fonte: Wikipédia</a>
                </Accordion.Body>
            </Accordion.Item>
        </Accordion>
    )
}

export default AccordionWikipedia