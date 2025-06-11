import React from 'react'
import Form from 'react-bootstrap/Form';
import InputGroup from 'react-bootstrap/InputGroup';

const FormContacts = (props) => {
    return (
        <Form>
            <InputGroup className="mb-3">
                <InputGroup.Text>Presidente da Câmara Atual</InputGroup.Text>
                <Form.Control
                    value={props.city?.president}
                    readOnly
                />
            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Text>Morada da Câmara Municipal</InputGroup.Text>
                <Form.Control
                    value={props.city?.address}
                    readOnly
                />
            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Text>Email da Câmara Municipal</InputGroup.Text>
                <Form.Control
                    value={props.city?.email}
                    readOnly
                />
            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Text>Telefone da Câmara Municipal</InputGroup.Text>
                <Form.Control
                    value={props.city?.phone}
                    readOnly
                />
            </InputGroup>
        </Form>
    )
}

export default FormContacts
