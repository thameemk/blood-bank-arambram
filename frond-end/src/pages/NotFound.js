import React from 'react';
import { Helmet } from 'react-helmet';
import Container from '@material-ui/core/Container';

function NotFound(){
    return(
        <Container  component="main" maxWidth="xs">
            <Helmet>
                <title>404</title>
            </Helmet>
            <h1>404 Page Not Found</h1>
        </Container>        
    );    
}

export default NotFound;