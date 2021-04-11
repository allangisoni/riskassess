import React from 'react';
//axios for api request
import Axios from 'axios';
//import './css/components.css';
import { BrowserRouter as Router, Link, Switch , Route } from 'react-router-dom';


import Container from '@material-ui/core/Container';
import Grid from '@material-ui/core/Grid';
import { makeStyles } from '@material-ui/core/styles';
import Card from '@material-ui/core/Card';
import CardActionArea from '@material-ui/core/CardActionArea';
import CardActions from '@material-ui/core/CardActions';
import CardContent from '@material-ui/core/CardContent';
import CardMedia from '@material-ui/core/CardMedia';
import Button from '@material-ui/core/Button';
import Typography from '@material-ui/core/Typography';

import quality from './../images/quality2.jpg';
import safety from './../images/safety1.jpg';





const useStyles = makeStyles((theme) => ({
  

     root: {
     maxWidth: 300,
     backgroundColor: '#4d137f',     
            }, 

    root2: {
    maxWidth: 300,
     backgroundColor: '#ff9900',         
  },
  media: {
    height: 200,
  },
 content: {
     
     color: '#fff',
 },
 button: {
     margin:'0 0 0 8px',
 },    
}));


function NewEntry() {

  const classes = useStyles();


return (

    
    <div> 
    <Container fixed>
    
         <Grid container 
               spacing={4}  
               direction="row"
               justify="center"
               alignItems="start"
              >
    
           <Grid item xs={false} sm={1} md={1} lg={2}  > </ Grid>
    
    
           <Grid item xs={12} sm={5} md={5} lg={4}  >
         <div className="cardDiv">
      <Card className={classes.root}>
      <CardActionArea>
  
        <CardMedia
          className={classes.media}
          //image={safety}
          image="https://progameguides.com/wp-content/uploads/2019/10/fortnite-outfit-scratch.jpg"
          title=" SAFETY TRIGGER"
        />
    
        <CardContent className={classes.content} >
          <Typography gutterBottom variant="h5" component="h2">
            SAFETY TRIGGER
          </Typography>
          
        </CardContent>
      </CardActionArea>
      <CardActions>
             <Link to='/pmd/Safety'>
        <Button size="medium" variant="contained" color="primary" className={classes.button}>
          CREATE
        </Button>
      </Link>
    
      </CardActions>
     </Card>
        </div> 
          </Grid>
         <Grid item xs={12} sm={5} md={5} lg={4} >
    
       <Card className={classes.root2}>
      <CardActionArea >
        <CardMedia
          className={classes.media}
          image={quality}
          title=" QUALITY TRIGGER"
        />
        <CardContent className={classes.content} >
          <Typography gutterBottom variant="h5" component="h2">
            QUALITY TRIGGER
          </Typography>
          
        </CardContent>
      </CardActionArea>
      <CardActions  >
     <Link to='/pmd/Quality'>
        <Button size="medium" variant="contained" color="primary" className={classes.button} >
          CREATE
        </Button>
    </Link>
      </CardActions>
     </Card>
          </Grid>
    
    
     <Grid item xs={false} sm={1} md={1} lg={2}  > </ Grid>
    
         </Grid>
    
   
    
    </Container>
    </div>
);



}
    
export default  NewEntry ;    

    
 
    
    







 
    

    
    
   
    


