import GenericLayout from '@/Layouts/GenericLayout'
import { Alert as BootstrapAlert } from 'react-bootstrap'
import React, { useState } from 'react'
import {
    Box,
    Container,
    Typography,
    TextField,
    Button,
    Grid,
    Card,
    CardContent,
    Alert,
    CircularProgress,
    Divider,
    Paper
} from '@mui/material'
import {
    Email,
    Phone,
    LocationOn,
    Send,
    Person,
    Subject
} from '@mui/icons-material'

const ContactUs = () => {
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        phone: '',
        subject: '',
        message: ''
    })
    const [loading, setLoading] = useState(false)
    const [success, setSuccess] = useState(false)
    const [error, setError] = useState('')
    const [showRedirectAlert, setShowRedirectAlert] = useState(false)

    const handleChange = (e) => {
        const { name, value } = e.target
        setFormData(prev => ({
            ...prev,
            [name]: value
        }))
    }

    const handleSubmit = async (e) => {
        e.preventDefault()
        setLoading(true)
        setError('')
        setSuccess(false)
        setShowRedirectAlert(false)

        try {
            // Simulate processing time
            await new Promise(resolve => setTimeout(resolve, 1500))

            // Show React Bootstrap alert
            setShowRedirectAlert(true)


        } catch (err) {
            setError('Erro inesperado. Por favor, contacte-nos através do LinkedIn.')
        } finally {
            setLoading(false)
        }
    }

    return (
        <GenericLayout main={
            <Container maxWidth="lg" sx={{ py: 4 }}>
                <Box sx={{ mb: 4, textAlign: 'center' }}>
                    <Typography variant="h3" component="h1" gutterBottom color="primary">
                        Contacte-nos
                    </Typography>
                    <Typography variant="h6" color="text.secondary">
                        A MinhaRegião.pt é um projeto open-source e por isso a opinião de todos é importante.
                    </Typography>
                </Box>

                <Grid container spacing={4}>
                    {/* Contact Form */}
                    <Grid item xs={12} md={8}>
                        <Card elevation={3}>
                            <CardContent sx={{ p: 4 }}>
                                <Typography variant="h5" gutterBottom>
                                    Envie-nos uma Mensagem
                                </Typography>

                                {showRedirectAlert && (
                                    <BootstrapAlert variant="danger" className="mb-3">
                                        <strong>Erro a Processar a Sua Mensagem</strong>
                                        <br />
                                        Contracte-nos diretamente através do <a href="https://www.linkedin.com/company/minha-regi%C3%A3o" target="_blank">nosso LinkedIn</a> por favor.
                                    </BootstrapAlert>
                                )}

                                {error && (
                                    <Alert severity="error" sx={{ mb: 3 }}>
                                        {error}
                                    </Alert>
                                )}

                                <Box component="form" onSubmit={handleSubmit}>
                                    <Grid container spacing={3}>
                                        <Grid item size={{ "xs": 12, "sm": 6 }}>
                                            <TextField
                                                fullWidth
                                                label="Nome Completo"
                                                name="name"
                                                value={formData.name}
                                                onChange={handleChange}
                                                required
                                                variant="outlined"
                                                InputProps={{
                                                    startAdornment: <Person sx={{ mr: 1, color: 'text.secondary' }} />
                                                }}
                                            />
                                        </Grid>
                                        <Grid item size={{ "xs": 12, "sm": 6 }}>
                                            <TextField
                                                fullWidth
                                                label="Endereço de Email"
                                                name="email"
                                                type="email"
                                                value={formData.email}
                                                onChange={handleChange}
                                                required
                                                variant="outlined"
                                                InputProps={{
                                                    startAdornment: <Email sx={{ mr: 1, color: 'text.secondary' }} />
                                                }}
                                            />
                                        </Grid>
                                        <Grid item size={{ "xs": 12, "sm": 6 }}>
                                            <TextField
                                                fullWidth
                                                label="Assunto"
                                                name="subject"
                                                value={formData.subject}
                                                onChange={handleChange}
                                                required
                                                variant="outlined"
                                                InputProps={{
                                                    startAdornment: <Subject sx={{ mr: 1, color: 'text.secondary' }} />
                                                }}
                                            />
                                        </Grid>
                                        <Grid item size={12}>
                                            <TextField
                                                fullWidth
                                                label="Mensagem"
                                                name="message"
                                                value={formData.message}
                                                onChange={handleChange}
                                                required
                                                multiline
                                                rows={6}
                                                variant="outlined"
                                                placeholder="Diga-nos como podemos ajudá-lo..."
                                            />
                                        </Grid>
                                        <Grid item size={12}>
                                            <Button
                                                type="submit"
                                                variant="contained"
                                                size="large"
                                                fullWidth
                                                disabled={loading}
                                                startIcon={loading ? <CircularProgress size={20} /> : <Send />}
                                                sx={{ py: 1.5 }}
                                            >
                                                {loading ? 'A enviar...' : 'Enviar Mensagem'}
                                            </Button>
                                        </Grid>
                                    </Grid>
                                </Box>
                            </CardContent>
                        </Card>
                    </Grid>
                </Grid>
            </Container>
        } />
    )
}

export default ContactUs
