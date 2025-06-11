import React from 'react'
import Form from 'react-bootstrap/Form';
import InputGroup from 'react-bootstrap/InputGroup';

const FormGeography = (props) => {
    return (
        <Form>
            <InputGroup className="mb-3">
                <InputGroup.Text>Nome</InputGroup.Text>
                <Form.Control
                    value={props.municipality?.name}
                    readOnly
                />
            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Text>Concelho</InputGroup.Text>
                <Form.Control
                    value={props.municipality?.city?.name}
                    readOnly
                />
            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Text>Distrito</InputGroup.Text>
                <Form.Control
                    value={props.municipality?.city?.district?.name}
                    readOnly
                />
            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Text>Código Postal</InputGroup.Text>
                <Form.Control
                    value={props.municipality?.zip_code?.split('-')[0]}
                    readOnly
                />
            </InputGroup>
        </Form>
        /*

        <Divider />

        <h3>Contactos Junta de Freguesia</h3>

        

        <Divider />

        <h3>Links Úteis</h3>

    </Form>
    */
    )
}

export default FormGeography
