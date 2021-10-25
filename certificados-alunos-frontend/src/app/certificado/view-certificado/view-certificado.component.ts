import { Component, OnInit, } from '@angular/core';
import { DomSanitizer, SafeResourceUrl, } from '@angular/platform-browser';
import { ActivatedRoute, Router, } from '@angular/router';
import { FormControl } from '@angular/forms';
import { Observable } from 'rxjs';

import { environment } from 'src/environments/environment';
import { ViewCertificadoService } from './view-certificado.service';
import { AuthService } from 'src/app/shared/auth.service';
import { map } from 'rxjs/operators';

@Component({
  selector: 'app-view-certificado',
  templateUrl: './view-certificado.component.html',
  styleUrls: ['./view-certificado.component.scss'],
  host: {
    class: 'flex-fill'
  }
})
export class ViewCertificadoComponent implements OnInit {

  certificado$ = this.viewCertificadoService.certificado$
  url_certificado$: Observable<SafeResourceUrl> = this.viewCertificadoService.certificado$
    .pipe(
      map(
        certificado => {

          if (!certificado)
            return this.domSanitizer.bypassSecurityTrustResourceUrl('')

          return this.domSanitizer.bypassSecurityTrustResourceUrl(environment.url_backend + '/certificado/' + certificado.id)
        }
      )
    )

  userIsHomologador$: Observable<boolean> = this.authService.userIsHomologador$

  horasFormControl = new FormControl()
  mensagemFormControl = new FormControl()

  constructor(
    private domSanitizer: DomSanitizer,
    private activatedRoute: ActivatedRoute,
    private router: Router,
    private viewCertificadoService: ViewCertificadoService,
    private authService: AuthService,
  ) { }

  ngOnInit(): void {

    this.getCertificado()
  }

  getCertificado(): void {

    const id = Number(this.activatedRoute.snapshot.paramMap.get('id'));
    this.viewCertificadoService.getCertificadoDetail(id)
      .subscribe(certificado => {
        this.horasFormControl.setValue(certificado.horas)
      });
  }

  onClickBack() {

    this.router.navigate(['../'], { relativeTo: this.activatedRoute })
  }

  iniciarHomologacao() {

    if (!this.certificado$.value)
      return;

    this.viewCertificadoService.iniciarHomologacao({
      id_certificado: this.certificado$.value.id,
      status: 'iniciado',
    })
      .subscribe(
      )
  }

  aceitarHomologacao() {

    if (!this.certificado$.value)
      return;

    this.viewCertificadoService.iniciarHomologacao({
      id_certificado: this.certificado$.value.id,
      status: 'homologado',
      horas: this.horasFormControl.value,
      mensagem: this.mensagemFormControl.value,
    })
      .subscribe(
      )
  }

  negarHomologacao() {

    if (!this.certificado$.value)
      return;

    this.viewCertificadoService.iniciarHomologacao({
      id_certificado: this.certificado$.value.id,
      status: 'negado',
      horas: this.horasFormControl.value,
      mensagem: this.mensagemFormControl.value,
    })
      .subscribe(
      )
  }
}
