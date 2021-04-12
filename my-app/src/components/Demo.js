import React from 'react';
import PropTypes from 'prop-types';
import AppBar from '@material-ui/core/AppBar';
import CssBaseline from '@material-ui/core/CssBaseline';
import Divider from '@material-ui/core/Divider';
import Drawer from '@material-ui/core/Drawer';
import Hidden from '@material-ui/core/Hidden';
import IconButton from '@material-ui/core/IconButton';
import InboxIcon from '@material-ui/icons/MoveToInbox';
import List from '@material-ui/core/List';
import ListItem from '@material-ui/core/ListItem';
import ListItemIcon from '@material-ui/core/ListItemIcon';
import ListItemText from '@material-ui/core/ListItemText';
import MailIcon from '@material-ui/icons/Mail';
import NoteAddRoundedIcon from '@material-ui/icons/NoteAddRounded';
import DescriptionRoundedIcon from '@material-ui/icons/DescriptionRounded';
import PeopleRoundedIcon from '@material-ui/icons/PeopleRounded';
import TvRoundedIcon from '@material-ui/icons/TvRounded';
import MenuIcon from '@material-ui/icons/Menu';
import Toolbar from '@material-ui/core/Toolbar';
import Typography from '@material-ui/core/Typography';
import { makeStyles, useTheme } from '@material-ui/core/styles';
import { BrowserRouter as Router, Link, Switch , Route } from 'react-router-dom';
//import Nav from './Nav';
import Users from './Users';
import Visuals from './Visuals';
import NewEntry from './NewEntry';
import SafetyPMD from './pmd/Safety';
import QualityPMD from './pmd/Quality';

const drawerWidth = 240;

const useStyles = makeStyles((theme) => ({
  root: {
    display: 'flex',
  },
  drawer: {
    [theme.breakpoints.up('sm')]: {
      width: drawerWidth,
      flexShrink: 0,
    },
  },
  appBar: {
    [theme.breakpoints.up('sm')]: {
      width: `calc(100% - ${drawerWidth}px)`,
      marginLeft: drawerWidth,
    },
  },
  menuButton: {
    marginRight: theme.spacing(2),
    [theme.breakpoints.up('sm')]: {
      display: 'none',
    },
  },
  // necessary for content to be below app bar
  toolbar: theme.mixins.toolbar,
  drawerPaper: {
    width: drawerWidth,
  },
  content: {
    flexGrow: 1,
    padding: theme.spacing(3),
    backgroundColor:'#f5f8fa',  
  },
  divContent: {
   // backgroundColor:'#e9f5f7',
  },    
}));

function ResponsiveDrawer(props) {
  const { window } = props;
  const classes = useStyles();
  const theme = useTheme();
  const [mobileOpen, setMobileOpen] = React.useState(false);

  const handleDrawerToggle = () => {
    setMobileOpen(!mobileOpen);
  };
    
 const drawerIcons = [ {title:'New Entry', icon:NoteAddRoundedIcon, url:'/NewEntry'}, {title:'Visuals', icon:TvRoundedIcon, url:'/Visuals'}, {title:'Reports', icon:DescriptionRoundedIcon, url:'/Users'}, {title:'Users', icon:PeopleRoundedIcon, url:'/Users'} ];   

  const drawer = (
    <div>
      <div className={classes.toolbar} />
      <Divider />
      <List>
        {drawerIcons.map((text, index) => (
         <Link to={text.url} key={text.title}>
          <ListItem button >
         
           <ListItemIcon > <text.icon/> </ListItemIcon>
     
            <ListItemText primary={text.title} />
          </ListItem>
         </Link >
        ))}
      </List>
      <Divider />
    </div>
  );

  const container = window !== undefined ? () => window().document.body : undefined;

  return (
    <div className={classes.root}>
      <CssBaseline />
      <AppBar position="fixed" className={classes.appBar}>
        <Toolbar>
          <IconButton
            color="inherit"
            aria-label="open drawer"
            edge="start"
            onClick={handleDrawerToggle}
            className={classes.menuButton}
          >
            <MenuIcon />
          </IconButton>
          <Typography variant="h6" noWrap>
            TRIGGERS
          </Typography>
        </Toolbar>
      </AppBar>
      <nav className={classes.drawer} aria-label="mailbox folders">
        {/* The implementation can be swapped with js to avoid SEO duplication of links. */}
        <Hidden smUp implementation="css">
          <Drawer
            container={container}
            variant="temporary"
            anchor={theme.direction === 'rtl' ? 'right' : 'left'}
            open={mobileOpen}
            onClose={handleDrawerToggle}
            classes={{
              paper: classes.drawerPaper,
            }}
            ModalProps={{
              keepMounted: true, // Better open performance on mobile.
            }}
          >
            {drawer}
          </Drawer>
        </Hidden>
        <Hidden xsDown implementation="css">
          <Drawer
            classes={{
              paper: classes.drawerPaper,
            }}
            variant="permanent"
            open
          >
            {drawer}
          </Drawer>
        </Hidden>
      </nav>
      <main className={classes.content}>
        <div className={classes.toolbar} />
 
        <div className={classes.divContent}>
        <Switch> 
           <Route path="/" exact component={NewEntry} />  
           <Route path="/Users" component={Users} />
           <Route path="/Visuals" component={Visuals} />
           <Route path="/NewEntry" component={NewEntry} />
           <Route path="/pmd/Safety" component={SafetyPMD} />
           <Route path="/pmd/Quality" component={QualityPMD} />
           </Switch>
        </div>
      
      
      </main>
    </div>
  );
}

ResponsiveDrawer.propTypes = {
  /**
   * Injected by the documentation to work in an iframe.
   * You won't need it on your project.
   */
  window: PropTypes.func,
};

export default ResponsiveDrawer;


    
 
    
    







 
    

    
    
   
    


