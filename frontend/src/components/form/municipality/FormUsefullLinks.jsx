import React from 'react'
import Form from 'react-bootstrap/Form';
import InputGroup from 'react-bootstrap/InputGroup';

const FormUsefullLinks = (props) => {
    return (
        <Form>
            <InputGroup className="mb-3">
                <InputGroup.Text>URL Freguesias PT</InputGroup.Text>
                <Form.Control
                    value={props.municipality?.freguesias_pt_url}
                    readOnly
                />
            </InputGroup>
        </Form>
    )
}

export default FormUsefullLinks
