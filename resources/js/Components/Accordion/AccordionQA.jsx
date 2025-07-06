import React from 'react'
import Accordion from 'react-bootstrap/Accordion';

const AccordionQA = (props) => {
    return (
        <Accordion className="accordion-qa">
            <Accordion.Item eventKey="0">
                <Accordion.Header>{props.question}</Accordion.Header>
                <Accordion.Body>
                    <div className="accordion-content">
                        {props.answer}
                    </div>
                </Accordion.Body>
            </Accordion.Item>
        </Accordion>
    )
}

export default AccordionQA
