import React from 'react'
import Accordion from 'react-bootstrap/Accordion';

const AccordionWikipedia = ({ name, wikipedia }) => {
    return (
        <Accordion className="accordion-wikipedia">
            <Accordion.Item eventKey="0">
                <Accordion.Header>{name ?? wikipedia?.title}</Accordion.Header>
                <Accordion.Body>
                    <div className="accordion-content">
                        {wikipedia?.summary ?? "Não foi possível encontrar informações sobre este local na Wikipédia."}
                    </div>
                    {wikipedia?.summary && (
                        <>
                            <hr />
                            <div className="accordion-footer">
                                <a href={wikipedia?.url} target="_blank" rel="noopener noreferrer">Fonte: Wikipédia</a>
                            </div>
                        </>
                    )}
                </Accordion.Body>
            </Accordion.Item>
        </Accordion>
    )
}

export default AccordionWikipedia