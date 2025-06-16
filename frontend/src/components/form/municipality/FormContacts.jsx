import React from 'react'
import Form from 'react-bootstrap/Form';
import InputGroup from 'react-bootstrap/InputGroup';

const FormContacts = (props) => {
    return (
        <Form>
            <InputGroup className="mb-3">
                <InputGroup.Text>Presidente da Junta Atual</InputGroup.Text>
                <Form.Control
                    value={props.municipality?.president}
                    readOnly
                />
            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Text>Morada da Junta de Freguesia</InputGroup.Text>
                <Form.Control
                    value={props.municipality?.address}
                    readOnly
                />
            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Text>Email da Junta de Freguesia</InputGroup.Text>
                <Form.Control
                    value={props.municipality?.email}
                    readOnly
                />
            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Text>Telefone da Junta de Freguesia</InputGroup.Text>
                <Form.Control
                    value={props.municipality?.phone}
                    readOnly
                />
            </InputGroup>
        </Form>
    )
}

export default FormContacts
