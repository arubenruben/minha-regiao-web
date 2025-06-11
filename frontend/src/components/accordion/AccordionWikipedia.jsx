import React from 'react'
import Accordion from 'react-bootstrap/Accordion';


const AccordionWikipedia = (props) => {
    return (
        <Accordion className="accordion-wikipedia">
            <Accordion.Item eventKey="0">
                <Accordion.Header>{props.name ?? props.wikipedia?.title}</Accordion.Header>
                <Accordion.Body>
                    {props.wikipedia?.summary}
                    <br />
                    <a href={props.wikipedia?.wikipedia_url} target="_blank" rel="noopener noreferrer">Fonte: Wikipédia</a>
                </Accordion.Body>
            </Accordion.Item>
        </Accordion>
    )
}

export default AccordionWikipedia
