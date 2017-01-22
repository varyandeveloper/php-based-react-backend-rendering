class Hello extends React.Component{
    render(){
        return(
            <h1>
                {/* this.props.name (name taken from backend hello action) */}
            Hello {this.props.name}
            </h1>
        );
    }
}

class Bye extends React.Component{
    render(){
        return(
            <h1>
                {/* this.props.name (name taken from backend bye action) */}
            Bye {this.props.name}
            </h1>
        );
    }
}